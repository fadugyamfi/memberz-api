<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Activity Logs
 */
class ActivityLogController extends Controller
{
    use ApiControllerBehavior {
        search as apiSearch;
    }

    public function __construct(ActivityLog $activityLog) {
        $this->setApiModel($activityLog);
    }

    /**
     * Get All
     * @apiResourceModel App\Models\ActivityLog
     */
    public function search(Request $request)
    {
        return $this->apiSearch($request);
    }
}
