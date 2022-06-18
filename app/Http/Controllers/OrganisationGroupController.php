<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationGroupRequest;
use App\Http\Resources\OrganisationGroupResource;
use App\Models\OrganisationGroup;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Groups
 */
class OrganisationGroupController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationGroup $OrganisationGroup)
    {
        $this->setApiModel($OrganisationGroup);
        $this->setApiResource(OrganisationGroupResource::class);
    }

    /**
     * Create Group
     */
    public function store(OrganisationGroupRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Group
     */
    public function update(OrganisationGroupRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
