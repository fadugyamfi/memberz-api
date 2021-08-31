<?php

namespace App\Http\Controllers;

use App\Models\ContributionReceiptSetting;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Contribution Receipt Settings
 */
class ContributionReceiptSettingController extends ApiController
{
    public function __construct(ContributionReceiptSetting $contributionReceiptSetting) {
        parent::__construct($contributionReceiptSetting);
    }
}
