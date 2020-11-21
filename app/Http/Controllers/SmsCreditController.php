<?php

namespace App\Http\Controllers;

use App\Models\SmsCredit;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group SMS Credits
 */
class SmsCreditController extends ApiController
{
    public function __construct(SmsCredit $smsCredit) {
        parent::__construct($smsCredit);
    }
}
