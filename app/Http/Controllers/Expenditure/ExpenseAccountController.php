<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\ExpenseAccount;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenditure - Accounts
 */
class ExpenseAccountController extends ApiController
{
    public function __construct(ExpenseAccount $account) {
        parent::__construct($account);
    }
}
