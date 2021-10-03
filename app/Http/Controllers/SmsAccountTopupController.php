<?php

namespace App\Http\Controllers;

use App\Models\SmsAccountTopup;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group SMS Account Topups
 */
class SmsAccountTopupController extends ApiController
{
    public function __construct(SmsAccountTopup $smsAccountTopup) {
        parent::__construct($smsAccountTopup);
    }
}
