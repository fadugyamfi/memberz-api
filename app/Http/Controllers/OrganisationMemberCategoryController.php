<?php

namespace App\Http\Controllers;

use App\Models\OrganisationMemberCategory;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Member Categories
 */
class OrganisationMemberCategoryController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationMemberCategory $organisationMemberCategory) {
        $this->setApiModel($organisationMemberCategory);
    }

    /**
     * Create Group
     */
    public function store(Request $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Group
     */
    public function update(Request $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
