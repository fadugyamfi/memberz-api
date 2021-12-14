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

        return OrganisationMember::approved()->active()
            ->join('organisation_member_categories', function($join) {
                $join->on('organisation_member_categories.id', 'organisation_members.organisation_member_category_id')
                    ->where('organisation_member_categories.default', 1);
            })
            ->join('members', 'members.id', '=', 'organisation_members.member_id')
            ->leftJoin('module_member_contributions', function($join) use($request) {
                $join->on('module_member_contributions.organisation_member_id', 'organisation_members.id')
                    ->where('module_member_contributions.year', $request->year);
            })
            ->whereNull('module_member_contributions.id')
            ->select('organisation_members.*')
            ->with('member', 'organisationMemberCategory')
            ->orderBy('members.last_name')
            ->get()
            ->transform(function($record) {
                return [
                    'last_name' => $record->member->last_name,
                    'first_name' => $record->member->first_name,
                    'full_name' => $record->member->last_name . ' ' . $record->member->first_name,
                    'email' => $record->member->email,
                    'age' => $record->member->age,
                    'mobile_number' => $record->member->mobile_number,
                    'membership_category' => $record->organisationMemberCategory?->name
                ];
            });
    }

}
