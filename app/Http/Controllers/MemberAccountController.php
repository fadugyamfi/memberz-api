<?php

namespace App\Http\Controllers;

use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationMember;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Member Accounts
 */
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

        $organisationAccountOrgIds = OrganisationAccount::organisationIds($memberAccount->id);
        $organisationMemberOrgIds = OrganisationMember::organisationIds($memberAccount->member_id);

        $uniqueIds = collect($organisationAccountOrgIds)->merge($organisationMemberOrgIds)->unique()->all();

        $organisations = Organisation::whereIn('id', $uniqueIds)->with([
            'activeSubscription' => function($query) {
                return $query->with(['subscriptionType', 'organisationInvoice.transactionType']);
            },
            'organisationType'
        ])->orderBy('name', 'asc')->paginate($limit);

        return $this->Resource::collection($organisations);
    }
}
