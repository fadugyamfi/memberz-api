<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\Account;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenditure - Accounts
 */
class AccountController extends ApiController
{
    public function __construct(Account $account) {
        parent::__construct($account);
    }
}
