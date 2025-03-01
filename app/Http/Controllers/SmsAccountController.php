<?php

namespace App\Http\Controllers;

use App\Models\SmsAccount;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group SMS Accounts
 */
class SmsAccountController extends ApiController
{
    public function __construct(SmsAccount $smsAccount) {
        parent::__construct($smsAccount);
    }
}
