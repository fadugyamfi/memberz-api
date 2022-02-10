<?php

namespace App\Observers;

use App\Models\OrganisationRegistrationForm;
use Illuminate\Support\Str;

class OrganisationRegistrationFormObserver
{

    public function creating(OrganisationRegistrationForm $organisationRegistrationForm) {
        $organisationRegistrationForm->uuid = Str::uuid();
        $organisationRegistrationForm->slug = Str::kebab($organisationRegistrationForm->name);
    }

    /**
     * Handle the OrganisationRegistrationForm "created" event.
     *
     * @param  \App\Models\OrganisationRegistrationForm  $organisationRegistrationForm
     * @return void
     */
    public function created(OrganisationRegistrationForm $organisationRegistrationForm)
    {
        //
    }

    /**
     * Handle the OrganisationRegistrationForm "updated" event.
     *
     * @param  \App\Models\OrganisationRegistrationForm  $organisationRegistrationForm
     * @return void
     */
    public function updated(OrganisationRegistrationForm $organisationRegistrationForm)
    {
        //
    }

    /**
     * Handle the OrganisationRegistrationForm "deleted" event.
     *
     * @param  \App\Models\OrganisationRegistrationForm  $organisationRegistrationForm
     * @return void
     */
    public function deleted(OrganisationRegistrationForm $organisationRegistrationForm)
    {
        //
    }

    /**
     * Handle the OrganisationRegistrationForm "restored" event.
     *
     * @param  \App\Models\OrganisationRegistrationForm  $organisationRegistrationForm
     * @return void
     */
    public function restored(OrganisationRegistrationForm $organisationRegistrationForm)
    {
        //
    }

    /**
     * Handle the OrganisationRegistrationForm "force deleted" event.
     *
     * @param  \App\Models\OrganisationRegistrationForm  $organisationRegistrationForm
     * @return void
     */
    public function forceDeleted(OrganisationRegistrationForm $organisationRegistrationForm)
    {
        //
    }
}
