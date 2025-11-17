<?php

namespace App\Observers;

use App\Models\OrganisationAccount;
use App\Models\OrganisationMemberCategory;

class OrganisationAccountObserver
{
    /**
     * Handle the organisation Account "created" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function created(OrganisationAccount $organisationAccount)
    {
        $organisationAccount->sendAccountCreatedNotification();

        $this->addMemberToOrganisation($organisationAccount);
    }

    /**
     * Add member to organisation if they don't already exist
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    private function addMemberToOrganisation(OrganisationAccount $organisationAccount)
    {
        $member_id = $organisationAccount->memberAccount->member_id;
        $organisation_id = $organisationAccount->organisation_id;

        // add account profile to organisation if it doesn't already exist
        $existingMember = \App\Models\OrganisationMember::where([
            'organisation_id' => $organisation_id,
            'member_id' => $member_id
        ])->first();

        if( !$existingMember ) {
            \App\Models\OrganisationMember::create([
                'organisation_id' => $organisation_id,
                'member_id' => $member_id,
                'organisation_member_category_id' => OrganisationMemberCategory::getDefaultCategoryId($organisation_id),
                'approved' => 1,
                'active' => 1,
                'source' => 'admin',
                'approved_by' => auth()?->id(),
                'custom_attributes' => [
                    'added_via_member_account_id' => $organisationAccount->member_account_id,
                ]
            ]);
        }
    }


    /**
     * Handle the organisation Account "updating" event.
     *
     * @param  \App\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function updated(OrganisationAccount $organisationAccount)
    {
        $organisationAccount->sendAccountRoleChangedNotification();
    }
}
