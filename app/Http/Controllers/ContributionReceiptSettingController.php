<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionReceiptSettingRequest;
use App\Models\ContributionReceiptSetting;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Contribution Receipt Settings
 */
class ContributionReceiptSettingController extends Controller
{
    use ApiControllerBehavior {
        index as apiIndex;
        update as apiUpdate;
    }

    public function __construct(ContributionReceiptSetting $contributionReceiptSetting) {
        $this->setApiModel($contributionReceiptSetting);
    }

    /**
     * Get Settings
     */
    public function index(Request $request) {
        $setting = ContributionReceiptSetting::latest()->first();

        return response()->json($setting);
    }

    /**
     * Update Settings
     */
    public function update(ContributionReceiptSettingRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
