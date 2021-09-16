<?php

namespace App\Observers;

use App\Models\OrganisationAccount;
use App\Models\OrganisationRole;

class OrganisationAccountObserver
{
    /**
     * Handle the organisation Account "created" event.
     *
     * @param  \App\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function created(OrganisationAccount $organisationAccount)
    {
        if ($organisationAccount->organisation_role_id && $this->isAdmin($organisationAccount->organisation_role_id)){
            $organisationAccount->sendAccountCreatedNotification();
        }
    }

    private function isAdmin(int $organisation_role_id) : bool {
        return $organisation_role_id == OrganisationRole::isAdmin()->first()->id;
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
