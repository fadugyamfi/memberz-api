<?php

namespace App\Http\Controllers;

use App\Models\ContributionSummary;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Contribution Summary
 */
class ContributionSummaryController extends Controller
{
    use ApiControllerBehavior {
        search as apiSearch;
    }

    public function __construct(ContributionSummary $contributionSummary) {
        $this->setApiModel($contributionSummary);
    }

    /**
     * Get All
     * @apiResourceModel App\Models\ContributionSummary
     */
    public function search(Request $request)
    {
        return $this->apiSearch($request);
    }

}
