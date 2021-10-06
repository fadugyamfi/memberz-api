<?php

namespace App\Http\Controllers;

use App\Models\OrganisationAnniversary;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Anniversary
 */
class OrganisationAnniversaryController extends ApiController
{
    public function __construct(OrganisationAnniversary $organisationAnniversary) {
        parent::__construct($organisationAnniversary);
    }
}
