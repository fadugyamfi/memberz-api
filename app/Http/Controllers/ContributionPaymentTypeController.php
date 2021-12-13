<?php

namespace App\Http\Controllers;

use App\Models\ContributionPaymentType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Contribution Types
 */
class ContributionPaymentTypeController extends ApiController
{
    public function __construct(ContributionPaymentType $paymentType) {
        parent::__construct($paymentType);
    }
}
