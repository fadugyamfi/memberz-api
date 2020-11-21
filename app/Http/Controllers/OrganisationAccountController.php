<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationAccountRequest;
use App\Models\OrganisationAccount;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Accounts
 */
class OrganisationAccountController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(OrganisationAccount $organisationAccount)
    {
        $this->setApiModel($organisationAccount);
    }

    /**
     * Create Account
     */
    public function store(OrganisationAccountRequest $request)
    {
        return parent::store($request);
    }

    /**
     * Update Account
     */
    public function update(OrganisationAccountRequest $request, $id)
    {
        return parent::update($request, $id);
    }
}
