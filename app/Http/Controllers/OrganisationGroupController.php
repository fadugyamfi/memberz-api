<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationGroupRequest;
use App\Models\OrganisationGroup;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Groups
 */
class OrganisationGroupController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(OrganisationGroup $OrganisationGroup)
    {
        $this->setApiModel($OrganisationGroup);
    }

    /**
     * Create Group
     */
    public function store(OrganisationGroupRequest $request)
    {
        return parent::store($request);
    }

    /**
     * Update Group
     */
    public function update(OrganisationGroupRequest $request, $id)
    {
        return parent::update($request, $id);
    }
}
