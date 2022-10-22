<?php

namespace App\Http\Controllers\Expenditure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expenditure\ExpenseAccountRequest;
use App\Models\Expenditure\ExpenseAccount;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Expenditure - Accounts
 */
class ExpenseAccountController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(ExpenseAccount $account) {
        $this->setApiModel($account);
    }

    public function store(ExpenseAccountRequest $request)
    {
        return $this->apiStore($request);
    }

    public function update(ExpenseAccountRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
