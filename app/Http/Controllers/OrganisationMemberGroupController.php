<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationMemberGroupRequest;
use App\Http\Resources\OrganisationMemberGroupResource;
use App\Models\OrganisationMemberGroup;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Member Groups
 */
class OrganisationMemberGroupController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationMemberGroup $memberGroup)
    {
        $this->setApiModel($memberGroup);
        $this->setApiResource(OrganisationMemberGroupResource::class);
    }

    /**
     * Create Association
     *
     * @apiResourceModel App\Models\OrganisationMemberGroup
     * @apiResource App\Http\Resources\OrganisationMemberGroupResource
     */
    public function store(OrganisationMemberGroupRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Association
     *
     * @apiResourceModel App\Models\OrganisationMemberGroup
     * @apiResource App\Http\Resources\OrganisationMemberGroupResource
     */
    public function update(OrganisationMemberGroupRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
