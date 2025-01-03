<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganisationMemberImportResource;
use App\Models\OrganisationMemberImport;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * Imported membership class
 *
 * @group Organisation Member Imports
 */
class OrganisationMemberImportController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(OrganisationMemberImport $import)
    {
        $this->setApiModel($import);
        $this->setApiResource(OrganisationMemberImportResource::class);
    }
}
