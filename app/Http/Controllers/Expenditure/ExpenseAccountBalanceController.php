<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\ExpenseAccountBalance;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenditure - Account Balances
 */
class ExpenseAccountBalanceController extends ApiController
{
    public function __construct(ExpenseAccountBalance $accountBalance) {
        parent::__construct($accountBalance);
    }
}
