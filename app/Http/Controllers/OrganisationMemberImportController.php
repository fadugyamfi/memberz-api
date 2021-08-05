<?php

namespace App\Http\Controllers;

use App\Models\OrganisationMemberImport;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

class OrganisationMemberImportController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(OrganisationMemberImport $import)
    {
        $this->setApiModel($import);
    }
}
