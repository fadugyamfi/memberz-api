<?php

namespace App\Observers;

use App\Models\OrganisationPaymentPlatform;

class OrganisationPaymentPlatformObserver
{

    /**
     * Handle the OrganisationPaymentPlatform "created" event.
     *
     * @param  \App\Models\OrganisationPaymentPlatform  $organisationPaymentPlatform
     * @return void
     */
    public function created(OrganisationPaymentPlatform $organisationPaymentPlatform)
    {
        //
    }

    /**
     * Handle the OrganisationPaymentPlatform "updated" event.
     *
     * @param  \App\Models\OrganisationPaymentPlatform  $organisationPaymentPlatform
     * @return void
     */
    public function updated(OrganisationPaymentPlatform $organisationPaymentPlatform)
    {
        //
    }

    /**
     * Handle the OrganisationPaymentPlatform "deleted" event.
     *
     * @param  \App\Models\OrganisationPaymentPlatform  $organisationPaymentPlatform
     * @return void
     */
    public function deleted(OrganisationPaymentPlatform $organisationPaymentPlatform)
    {
        //
    }

    /**
     * Handle the OrganisationPaymentPlatform "restored" event.
     *
     * @param  \App\Models\OrganisationPaymentPlatform  $organisationPaymentPlatform
     * @return void
     */
    public function restored(OrganisationPaymentPlatform $organisationPaymentPlatform)
    {
        //
    }

    /**
     * Handle the OrganisationPaymentPlatform "force deleted" event.
     *
     * @param  \App\Models\OrganisationPaymentPlatform  $organisationPaymentPlatform
     * @return void
     */
    public function forceDeleted(OrganisationPaymentPlatform $organisationPaymentPlatform)
    {
        //
    }
}
