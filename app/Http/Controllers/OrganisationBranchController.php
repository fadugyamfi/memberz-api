<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationBranchRequest;
use App\Http\Resources\OrganisationBranchResource;
use App\Models\OrganisationBranch;
use LaravelApiBase\Http\Controllers\ApiController;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Branches
 */
class OrganisationBranchController extends Controller
{

    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationBranch $organisationBranch) {
        $this->setApiModel($organisationBranch);
        $this->setApiResource(OrganisationBranchResource::class);
    }

    /**
     * Create Branch
     */
    public function store(OrganisationBranchRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Branch
     */
    public function update(OrganisationBranchRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
