<?php

namespace App\Observers;

use App\Models\OrganisationAccount;

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
        if ($organisationAccount->organisationRole->isAdmin()){
            $organisationAccount->sendAccountCreatedNotification();
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
