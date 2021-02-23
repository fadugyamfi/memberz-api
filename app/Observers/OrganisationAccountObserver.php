<?php

namespace App\Observers;

use App\Models\MemberAccount;
use App\Models\OrganisationAccount;
use Exception;
use Illuminate\Support\Facades\Log;

class OrganisationAccountObserver
{

    /**
     * Handle the organisation account "creating" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function creating(OrganisationAccount $organisationAccount) {
        if( $organisationAccount->member_account_id ) {
            return;
        }

        $tempMemberAccount = MemberAccount::createTempAccount(request('member_id'));

        if( !$tempMemberAccount ) {
            Log::error("Temporary account not created/available, so not creating organisation account");
            return;
        }

        $organisationAccount->member_account_id = $tempMemberAccount->id;
    }

    /**
     * Handle the organisation account "created" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function created(OrganisationAccount $organisationAccount)
    {
        //
    }

    /**
     * Handle the organisation account "updated" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function updated(OrganisationAccount $organisationAccount)
    {
        //
    }

    /**
     * Handle the organisation account "deleted" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function deleted(OrganisationAccount $organisationAccount)
    {
        //
    }

    /**
     * Handle the organisation account "restored" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function restored(OrganisationAccount $organisationAccount)
    {
        //
    }

    /**
     * Handle the organisation account "force deleted" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function forceDeleted(OrganisationAccount $organisationAccount)
    {
        //
    }
}
