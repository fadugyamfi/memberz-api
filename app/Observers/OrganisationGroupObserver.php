<?php

namespace App\Observers;

use App\Models\OrganisationGroup;

class OrganisationGroupObserver
{

    /**
     * Handle the organisation "created" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisation
     * @return void
     */
    public function creating(OrganisationGroup $organisation)
    {

    }

    /**
     * Handle the organisation "created" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisation
     * @return void
     */
    public function created(OrganisationGroup $organisation)
    {

    }

    /**
     * Handle the organisation "updated" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisation
     * @return void
     */
    public function updated(OrganisationGroup $organisation)
    {
        //
    }

    /**
     * Handle the organisation "deleted" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisation
     * @return void
     */
    public function deleted(OrganisationGroup $organisation)
    {
        //
    }

    /**
     * Handle the organisation "restored" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisation
     * @return void
     */
    public function restored(OrganisationGroup $organisation)
    {
        //
    }

    /**
     * Handle the organisation "force deleted" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisation
     * @return void
     */
    public function forceDeleted(OrganisationGroup $organisation)
    {
        //
    }
}
