<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionReceiptSettingRequest;
use App\Http\Resources\ContributionReceiptSettingResource;
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

        if( !$setting ) {
            return response()->json(['message' => 'Settings not configured'], 404);
        }

        return response()->json(new ContributionReceiptSettingResource($setting));
    }

    /**
     * Update Settings
     */
    public function update(ContributionReceiptSettingRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
