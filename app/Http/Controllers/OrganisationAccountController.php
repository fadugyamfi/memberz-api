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

    /**
     * Get User Specific Account
     */
    public function userAccount(int $organisation_id, int $member_account_id) {
        $account = OrganisationAccount::with('organisationRole.permissions')
            ->where([
                'organisation_id' => $organisation_id,
                'member_account_id' => $member_account_id
            ])->first();

        if( !$account ) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        return new OrganisationAccountResource($account);
    }
}
