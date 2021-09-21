<?php

namespace App\Imports;

use App\Models\Member;
use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationFileImport;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationMemberImport;
use App\Notifications\MembershipImported;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\ImportFailed;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Propaganistas\LaravelPhone\PhoneNumber;

class OrganisationMembersImport implements ToModel, WithHeadingRow, WithChunkReading, WithEvents, ShouldQueue
{

    use Importable;

    private OrganisationFileImport $fileImport;
    private MemberAccount $memberAccount;
    private int $org_id;

    public function __construct(OrganisationFileImport $fileImport)
    {
        $this->fileImport = $fileImport;

        $auth_id = auth()->user()->id;
        $this->memberAccount = MemberAccount::find($auth_id);

        $tenantId = request()->header('X-Tenant-Id');
        $organisation  =  Organisation::where('uuid', $tenantId)->first();
        $this->org_id = $organisation->id;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $newMembership = null;
        $member = $this->retrieveOrCreateMember($row);

        $existingMembership = OrganisationMember::active()->approved()->where([
            'organisation_id' => $this->fileImport->organisation_id,
            'member_id' => $member->id
        ])->first();

        if( $existingMembership ) {
            $this->fileImport->records_existing += 1;
            $this->recordMemberImport($existingMembership, 'existing');

        } else if( $member->wasRecentlyCreated ) {
            $this->fileImport->records_imported += 1;
            $newMembership = $this->makeModel($row, $member);
            $this->recordMemberImport($newMembership, 'imported');

        } else if( !$member->wasRecentlyCreated ) {
            $this->fileImport->records_linked += 1;
            $newMembership = $this->makeModel($row, $member);
            $this->recordMemberImport($newMembership, 'linked');
        }

        $this->fileImport->save();

        return $existingMembership ?? $newMembership;
    }

    public function makeModel($row, $member) {
        $defaultCategory = OrganisationMemberCategory::where('default', 1)->first();
        $category = OrganisationMemberCategory::where([
            'organisation_id' => $this->fileImport->organisation_id,
            'name' => $row['category_name']
        ])->first();

        $orgAccount = OrganisationAccount::where([
            'member_account_id' => $this->fileImport->member_account_id,
            'organisation_id' => $this->fileImport->organisation_id
        ])->first();

        return OrganisationMember::create([
            'organisation_id' => $this->fileImport->organisation_id,
            'organisation_member_category_id' => $category ? $category->id : $defaultCategory->id,
            'organisation_no' => $row['membership_id'],
            'member_id' => $member->id,
            'approved' => 1,
            'approved_by' => $orgAccount ? $orgAccount->id : null,
        ]);
    }

    public function retrieveOrCreateMember($row) {
        $dob = Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d');
        $mobileNumber = $this->phoneNumberToE164($row['mobile_number']);

        return Member::firstOrCreate([
            'last_name' => $row['surname'],
            'mobile_number' => $mobileNumber,
            'email' => $row['email'],
            'dob' => $dob,
        ],
        [
            'title' => $row['title'],
            'first_name' => $row['other_names'],
            'last_name' => $row['surname'],
            'mobile_number' => $mobileNumber,
            'email' => $row['email'],
            'business_name' => $row['place_of_work'],
            'occupation' => $row['occupation'],
            'marital_status' => $row['marital_status'],
            'gender' => $row['gender'],
            'dob' => $dob,
            'address' => $row['address'],
            'nationality' => $row['nationality']
        ]);
    }

    function phoneNumberToE164($phoneNumber, $country = 'GH') {
        try {
            return (string) PhoneNumber::make($phoneNumber)->ofCountry($country)->formatE164();
        } catch(Exception $e) {
            Log::debug($e->getMessage());
            return $phoneNumber;
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterImport::class => function(AfterImport $event) {
                $this->fileImport->import_status = 'completed';
                $this->fileImport->save();
                $this->memberAccount->notify(new MembershipImported($this->fileImport->file_name, $this->org_id));
            },

            ImportFailed::class => function(ImportFailed $event) {
                $this->fileImport->import_status = 'failed';
                $this->fileImport->save();
                $this->memberAccount->notify(new MembershipImported($this->fileImport->file_name, $this->org_id, 'Failed'));
            },
        ];
    }

    public function recordMemberImport(OrganisationMember $membership, string $importType) {
        return OrganisationMemberImport::create([
            'organisation_id' => $this->fileImport->organisation_id,
            'organisation_file_import_id' => $this->fileImport->id,
            'organisation_member_id' => $membership->id,
            'import_type' => $importType
        ]);
    }
}
