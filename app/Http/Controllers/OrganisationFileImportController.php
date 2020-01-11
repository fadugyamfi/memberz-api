<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationFileImport;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationFileImportController extends ApiController
{
    public function __construct(OrganisationFileImport $organisationFileImport) {
        parent::__construct($organisationFileImport);
    } 
}