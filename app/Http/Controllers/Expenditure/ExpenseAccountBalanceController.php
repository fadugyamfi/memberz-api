<?php

namespace App\Http\Controllers\Expenditure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expenditure\ExpenseAccountBalanceRequest;
use App\Models\Expenditure\ExpenseAccountBalance;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Expenditure - Account Balances
 */
class ExpenseAccountBalanceController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(ExpenseAccountBalance $accountBalance) {
        $this->setApiModel($accountBalance);
    }

    public function store(ExpenseAccountBalanceRequest $request)
    {
        return $this->apiStore($request);
    }

    public function update(ExpenseAccountBalanceRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
