<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    /**
     * Get Log Groups
     */
    public function logGroups(Request $request) {
        $logNames = ActivityLog::select(DB::raw("DISTINCT log_name"))->orderBy('log_name')->get();

        return response()->json($logNames);
    }

    public function logs(Request $request) {
        $limit = $request->limit ?? 50;

        $activities = ActivityLog::with(['organisation', 'causer'])->latest()->paginate($limit);

        return view('activities.log', compact('activities'));
    }
}
