<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationMemberCategorySettingRequest;
use App\Models\OrganisationMemberCategorySetting;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Member Category Settings
 */
class OrganisationMemberCategorySettingController extends Controller
{

    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationMemberCategorySetting $memberCategorySetting) {
        parent::__construct($memberCategorySetting);
    }

    public function store(OrganisationMemberCategorySettingRequest $request)
    {
        return $this->apiStore($request);
    }

    public function update(OrganisationMemberCategorySettingRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
