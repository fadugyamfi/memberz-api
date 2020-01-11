<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationType;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationTypeController extends ApiController
{
    public function __construct(OrganisationType $type) {
        parent::__construct($type);
    }
} 