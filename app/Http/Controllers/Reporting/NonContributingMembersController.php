<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Requests\NonContributingMembersRequest;
use App\Models\Contribution;
use App\Models\Member;
use App\Models\OrganisationMember;

/**
 * @group Finance Reporting
 */
class NonContributingMembersController extends Controller
{

    public function __invoke(NonContributingMembersRequest $request)
    {
        $orgContributingMemberIds = Contribution::byYear($request->year)->pluck('organisation_member_id')->toArray();
        $orgNonContributingMemberIds = OrganisationMember::notInMemberIds($orgContributingMemberIds)->pluck('member_id')->toArray();
        return Member::whereIn('id', $orgNonContributingMemberIds)->get();
    }
    
}
