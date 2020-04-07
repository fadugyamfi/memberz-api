<?php

namespace App\Http\Controllers;

use App\Models\SmsAccountTopup;
use LaravelApiBase\Http\Controllers\ApiController;

class SmsAccountTopupController extends ApiController
{
    public function __construct(SmsAccountTopup $smsAccountTopup) {
        parent::__construct($smsAccountTopup);
    }
}
