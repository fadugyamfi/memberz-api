<?php

use App\Models\SmsBroadcastList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateSmsBroadcastListWithFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        activity()->disableLogging();

        DB::table('module_sms_broadcast_list_filters')->where('active', 1)->orderBy('id')->chunk(50, function ($filterRecords) {
            foreach ($filterRecords as $filterRecord) {
                $newRecord = $this->generateNewRecord($filterRecord);

                $broadcastList = SmsBroadcastList::withTrashed()->where('id', $filterRecord->module_sms_broadcast_list_id)->first();

                if( !$broadcastList ) {
                    continue;
                }

                $broadcastList->filters = collect($broadcastList->filters ?? [])->push($newRecord)->toArray();
                $broadcastList->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('module_sms_broadcast_list_filters')->orderBy('id')->chunk(50, function ($filterRecords) {
            foreach($filterRecords as $filterRecord) {
                DB::table('module_sms_broadcast_lists')
                    ->where('id', $filterRecord->module_sms_broadcast_list_id)
                    ->update(['filters' => null]);
            }
        });
    }

    private function generateNewRecord($filterRecord): array {
        $newFieldName = $this->mapFieldToNewName($filterRecord->field);

        $newRecord = [
            'field' => $newFieldName,
            'condition' => $filterRecord->condition,
            'value' => $filterRecord->value,
            'optional' => $filterRecord->optional
        ];

        if( str_contains($newFieldName, 'membership__group') ) {
            $newRecord['organisation_group_type_id'] = str_replace("group_type_id_", '', $filterRecord->field);
        }

        return $newRecord;
    }

    private function mapFieldToNewName(string $oldName): string
    {
        // deal with the explicit names first
        switch ($oldName) {
            case 'MemberPhoneNumber.number':
                return 'member__mobile_number';

            case 'OrganisationMember.organisation_member_category_id':
                return 'membership__category';

            case 'OrganisationMember.organisation_no':
                return 'membership__no';

            case 'MONTHNAME(Member.dob)':
                return 'members__birth_month';

            case 'DAYNAME(Member.dob)':
                return 'members__birth_day_of_week';
        }

        if( str_contains($oldName, 'group_type_id') ) {
            return "membership__group_" . str_replace('group_type_id_', '', $oldName);
        }

        // apply general rule if value doesn't meet criteria above
        $newName = Str::lower($oldName);

        if (stristr($newName, '.')) {
            return Str::replaceArray('.', ['__'], $newName);
        }

        return $newName;
    }
}
