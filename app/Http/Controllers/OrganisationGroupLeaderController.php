<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationGroupLeader;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationGroupLeaderController extends ApiController
{
    public function __construct(OrganisationGroupLeader $organisationGroupLeader) {
        parent::__construct($organisationGroupLeader);
    } 
}