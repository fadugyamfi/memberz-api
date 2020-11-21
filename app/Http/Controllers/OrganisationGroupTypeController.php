<?php


namespace App\Http\Controllers;

use App\Models\OrganisationGroupType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Group Types
 */
class OrganisationGroupTypeController extends ApiController
{
    public function __construct(OrganisationGroupType $organisationGroupType) {
        parent::__construct($organisationGroupType);
    }
}
