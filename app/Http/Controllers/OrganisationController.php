<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisations
 */
class OrganisationController extends ApiController
{
    public function __construct(Organisation $organisation)
    {
        parent::__construct($organisation);
    }
}
