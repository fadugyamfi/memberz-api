<?php 


namespace App\Http\Controllers;

use App\Models\OrganisationGroupType;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationGroupTypeController extends ApiController
{
    public function __construct(OrganisationGroupType $organisationGroupType) {
        parent::__construct($organisationGroupType);
    } 
}

