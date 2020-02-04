<?php

namespace App\Observers;

use App\Models\MemberAccount;
use App\Models\OrganisationGroupType;
use Illuminate\Support\Facades\Log;

class OrganisationGroupTypeObserver
{

    /**
     * Handle the organisation account "creating" event.
     *
     * @param  \App\Models\OrganisationGroupType  $organisationAccount
     * @return void
     */
    public function creating(OrganisationGroupType $organisationGroupType) {
        
    }

    /**
     * Handle the organisation account "created" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function created(OrganisationGroupType $organisationGroupType)
    {
        //
    }

    /**
     * Handle the organisation account "updated" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationGroupType
     * @return void
     */
    public function updated(OrganisationGroupType $organisationGroupType)
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
