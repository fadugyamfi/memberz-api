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
}
