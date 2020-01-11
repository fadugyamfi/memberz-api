<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationRole;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationRoleController extends ApiController
{
    public function __construct(OrganisationRole $organisationRole) {
        parent::__construct($organisationRole);
    } 
}