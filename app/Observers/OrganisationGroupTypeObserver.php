<?php

namespace App\Observers;

use App\Models\OrganisationGroupType;

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
     * @param  \App\Models\OrganisationGroupType  $organisationAccount
     * @return void
     */
    public function created(OrganisationGroupType $organisationGroupType)
    {
        //
    }

    /**
     * Handle the organisation account "updated" event.
     *
     * @param  \App\Models\OrganisationGroupType  $organisationGroupType
     * @return void
     */
    public function updated(OrganisationGroupType $organisationGroupType)
    {
        //
    }

    /**
     * Handle the organisation account "deleted" event.
     *
     * @param  \App\Models\OrganisationGroupType  $organisationAccount
     * @return void
     */
    public function deleted(OrganisationGroupType $organisationAccount)
    {
        //
    }

    /**
     * Handle the organisation account "restored" event.
     *
     * @param  \App\Models\OrganisationGroupType  $organisationAccount
     * @return void
     */
    public function restored(OrganisationGroupType $organisationAccount)
    {
        //
    }

    /**
     * Handle the organisation account "force deleted" event.
     *
     * @param  \App\Models\OrganisationGroupType  $organisationAccount
     * @return void
     */
    public function forceDeleted(OrganisationGroupType $organisationAccount)
    {
        //
    }
}
