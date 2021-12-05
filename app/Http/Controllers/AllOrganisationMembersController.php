<?php

namespace App\Http\Controllers;

use App\Models\OrganisationMember;

/**
 * @group Organisation Members
 */
class AllOrganisationMembersController extends Controller
{
    
    public function __invoke()
    {
        return OrganisationMember::with(['member', 'organisationMemberCategory'])->get()->transform(function($d){
            return [
                'membership_no' => $d->organisation_no,
                'name' => $d->member->full_name,
                'membership_category' => $d->organisationMemberCategory->name,
                'email' => $d->member->email,
                'phone_number' => $d->member->phone_number
            ];
        });
    }
}
