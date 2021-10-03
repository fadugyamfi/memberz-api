<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Subscription Types
 */
class SubscriptionTypeController extends ApiController
{
    public function __construct(SubscriptionType $subscription) {
        parent::__construct($subscription);
    }
}
