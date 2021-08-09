<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationAccountRequest;
use App\Http\Resources\OrganisationAccountResource;
use App\Models\OrganisationAccount;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Accounts
 */
class OrganisationAccountController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationAccount $organisationAccount)
    {
        $this->setApiModel($organisationAccount);
        $this->setApiResource(OrganisationAccountResource::class);
    }

    /**
     * Create Account
     */
    public function store(OrganisationAccountRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Account
     */
    public function update(OrganisationAccountRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
