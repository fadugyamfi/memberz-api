<?php

namespace App\Http\Controllers;

use App\Models\OrganisationMemberAnniversary;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Anniversary
 */
class OrganisationMemberAnniversaryController extends ApiController
{
    public function __construct(OrganisationMemberAnniversary $organisationMemberAnniversary) {
        parent::__construct($organisationMemberAnniversary);
    }
}
