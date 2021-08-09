<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Http\Requests\OrganisationRequest;
use App\Http\Resources\OrganisationResource;
use App\Models\Organisation;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisations
 */
class OrganisationController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(Organisation $organisation)
    {
        $this->setApiModel($organisation);
        $this->setApiFormRequest(OrganisationRequest::class);
        $this->setApiResource(OrganisationResource::class);
    }

    /**
     * Create Organisation
     */
    public function store(OrganisationCreationRequest $request) {
        return $this->apiStore($request);
    }

    /**
     * Update Organisation
     */
    public function update(OrganisationRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
