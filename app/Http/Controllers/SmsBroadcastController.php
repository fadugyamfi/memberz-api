<?php

namespace App\Http\Controllers;

use App\Models\SmsBroadcast;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group SMS Broadcast
 */
class SmsBroadcastController extends ApiController
{
    public function __construct(SmsBroadcast $broadcast) {
        parent::__construct($broadcast);
    }
}
