<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationFileImportRequest;
use App\Http\Resources\OrganisationFileImportResource;
use App\Models\OrganisationFileImport;
use Error;
use Exception;
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
        $this->setApiResource(OrganisationFileImportResource::class);
    }

    /**
     * Import File
     */
    public function store(OrganisationFileImportRequest $request)
    {
        try {
            return $this->apiStore($request);
        } catch(Exception | Error $e) {
            return response()->json(['stack' => $e->getTraceAsString()], 500);
        }
    }

    /**
     * Update Import
     */
    public function update(Request $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
