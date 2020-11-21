<?php

namespace App\Http\Controllers;

use App\Models\OrganisationFileImport;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation File Imports
 */
class OrganisationFileImportController extends ApiController
{
    public function __construct(OrganisationFileImport $organisationFileImport) {
        parent::__construct($organisationFileImport);
    }
}
