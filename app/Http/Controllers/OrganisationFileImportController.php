<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationFileImportRequest;
use App\Models\OrganisationFileImport;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation File Imports
 */
class OrganisationFileImportController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationFileImport $organisationFileImport) {
        $this->setApiModel($organisationFileImport);
    }

    /**
     * Import File
     */
    public function store(OrganisationFileImportRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Import
     */
    public function update(Request $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
