<?php

namespace App\Observers;

use App\Models\MemberAccount;
use App\Models\OrganisationAccount;
use Illuminate\Support\Facades\Log;

class OrganisationAccountObserver
{

    /**
     * Handle the organisation account "creating" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function creating(OrganisationAccount $organisationAccount)
    {
        if ($organisationAccount->member_account_id) {
            return;
        }

        $tempMemberAccount = MemberAccount::createTempAccount(request('member_id'));

        if (!$tempMemberAccount) {
            Log::error("Temporary account not created/available, so not creating organisation account");
            return;
        }

        $organisationAccount->member_account_id = $tempMemberAccount->id;
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
