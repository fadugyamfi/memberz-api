<?php

namespace App\Http\Controllers;

use App\Models\SmsAccountMessage;
use LaravelApiBase\Http\Controllers\ApiController;

class SmsAccountMessageController extends ApiController
{
    public function __construct(SmsAccountMessage $smsAccountMessage) {
        parent::__construct($smsAccountMessage);
    }
}
