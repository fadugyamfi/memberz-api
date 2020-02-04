<?php

namespace App\Observers;

use App\Models\OrganisationGroupLeader;




class OrganisationGroupLeaderObserver
{
    /**
     * Handle the organisation invoice item "created" event.
     *
     * @param  \App\Models\OrganisationGroupLeader  $organisationGroupLeader
     * @return void
     */
    public function created(OrganisationGroupLeader $organisationGroupLeader)
    {
        $invoice = $organisationGroupLeader->organisation_invoice;

        
    }

    /**
     * Handle the organisation invoice item "updated" event.
     *
     * @param  \App\Models\OrganisationGroupLeader  $organisationGroupLeader
     * @return void
     */
    public function updated(OrganisationGroupLeader $organisationGroupLeader)
    {
        //
    }

    /**
     * Handle the organisation invoice item "deleted" event.
     *
     * @param  \App\Models\OrganisationGroupLeader  $organisationGroupLeader
     * @return void
     */
    public function deleted(OrganisationGroupLeader $organisationGroupLeader)
    {
        //
    }

    /**
     * Handle the organisation invoice item "restored" event.
     *
     * @param  \App\Models\OrganisationGroupLeader  $organisationGroupLeader
     * @return void
     */
    public function restored(OrganisationGroupLeader $organisationGroupLeader)
    {
        //
    }

    /**
     * Handle the organisation invoice item "force deleted" event.
     *
     * @param  \App\Models\OrganisationGroupLeader  $organisationGroupLeader
     * @return void
     */
    public function forceDeleted(OrganisationGroupLeader $organisationGroupLeader)
    {
        //
    }
}
