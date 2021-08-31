<?php

namespace App\Http\Controllers;

use App\Models\ContributionReceipt;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Contribution Receipts
 */
class ContributionReceiptController extends ApiController
{
    public function __construct(ContributionReceipt $contributionReceipt) {
        parent::__construct($contributionReceipt);
    }
}
