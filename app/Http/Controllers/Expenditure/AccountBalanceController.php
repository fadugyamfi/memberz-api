<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\AccountBalance;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenditure - Account Balances
 */
class AccountBalanceController extends ApiController
{
    public function __construct(AccountBalance $accountBalance) {
        parent::__construct($accountBalance);
    }
}
