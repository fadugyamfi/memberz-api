<?php 

namespace App\Http\Controllers;

use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationMember;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

class MemberAccountController extends ApiController
{
    public function __construct(MemberAccount $memberAccount) {
        parent::__construct($memberAccount);
    }

    public function organisations(Request $request, int $member_account_id) {

        $memberAccount = MemberAccount::find($member_account_id);
        $limit = $request->limit ?? 15;

        if( !$memberAccount ) {
            return response()->json(['error' => 'Member Account Not Found'], 404);
        }

        $organisationAccountOrgIds = OrganisationAccount::memberAccountOrganisationIds($memberAccount->id);
        $organisationMemberOrgIds = OrganisationMember::memberOrganisationIds($memberAccount->member_id);

        $uniqueIds = collect($organisationAccountOrgIds)->merge($organisationMemberOrgIds)->unique()->all();

        $organisations = Organisation::whereIn('id', $uniqueIds)->with([
            'active_subscription.subscription_type', 'organisation_type'
        ])->orderBy('name', 'asc')->paginate($limit);

        return $this->Resource::collection($organisations);
    }
}