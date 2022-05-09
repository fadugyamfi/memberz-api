<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\Events\EventAttendeeResource;
use App\Http\Resources\Events\EventResource;
use App\Models\Events\Event;
use App\Models\Events\EventAttendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Landlord;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Events
 */
class EventController extends Controller {

    use ApiControllerBehavior;

    public function __construct(Event $event)
    {
        $this->setApiModel($event);
        $this->setApiResource(EventResource::class);
    }

    public function attendees(Request $request, Event $event) {

        $attendees = EventAttendee::where('organisation_event_id', $event->id)
            ->with(['session', 'membership', 'member'])
            ->join('members', 'members.id', '=', 'organisation_event_attendees.member_id')
            ->select('organisation_event_attendees.*')
            ->orderBy('organisation_event_attendees.organisation_event_session_id')
            ->orderBy('members.last_name')
            ->get();

        return EventAttendeeResource::collection($attendees);
    }

    public function attendanceStatistics(Request $request) {

        $attendances = DB::table('organisation_event_attendees')
            ->selectRaw('organisation_event_id, COUNT(member_id) as attendance')
            ->where('organisation_id', Landlord::getTenants()->first())
            ->where('created', '>=', DB::raw('DATE_SUB(now(), INTERVAL 365 DAY)'))
            ->groupBy('organisation_event_id');

        $record = DB::table('organisation_event_attendees')
            ->joinSub($attendances, 'attendances', function($join) {
                $join->on('organisation_event_attendees.organisation_event_id', '=', 'attendances.organisation_event_id');
            })
            ->selectRaw('MAX(attendance) as highest')
            ->selectRaw('ROUND(AVG(attendance)) as average')
            ->selectRaw('MIN(attendance) as lowest')
            ->get();

        return response()->json($record->first());
    }
}
