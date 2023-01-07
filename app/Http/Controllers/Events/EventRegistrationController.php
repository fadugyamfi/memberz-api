<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventRegistrationRequest;
use App\Models\Events\Event;
use App\Models\Events\EventAttendee;
use App\Models\Member;
use App\Models\OrganisationMember;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EventRegistrationRequest $request, Event $event)
    {
        $registrations = [];

        if ($request->has('membership_uuids') || $request->has('organisation_member_ids')) {
            $registrations = $this->registerOrganisationMemberships($request, $event);
        } else if ($request->has('member_ids')) {
            $registrations = $this->registerPlatformMembers($request, $event);
        }

        return response()->json([
            'message' => __('Attendance recorded'),
            'data' => $registrations
        ]);
    }

    private function registerOrganisationMemberships(EventRegistrationRequest $request, Event $event)
    {
        $memberships = OrganisationMember::query()
            ->when($request->membership_uuids, fn ($query) => $query->whereIn('uuid', $request->membership_uuids))
            ->when($request->organisation_member_ids, fn ($query) => $query->whereIn('id', $request->organisation_member_id))
            ->get();

        $skipped = [];
        $attendees = [];

        foreach ($memberships as $membership) {
            $attendee = EventAttendee::with(['member.profilePhoto'])->firstOrCreate([
                'organisation_id' => $event->organisation_id,
                'member_id' => $membership->member_id,
                'organisation_event_id' => $request->organisation_event_id,
                'organisation_event_session_id' => $request->organisation_event_session_id
            ]);

            if (!$attendee->wasRecentlyCreated) {
                $skipped[] = $membership;
            } else {
                $attendees[] = $attendee;
            }
        }

        return compact('skipped', 'attendees');
    }

    private function registerPlatformMembers(EventRegistrationRequest $request, Event $event)
    {
        $members = Member::query()
            ->whereIn('id', $request->input('member_ids', []))
            ->get();

        $skipped = [];
        $attendees = [];

        foreach ($members as $member) {
            $attendee = EventAttendee::with(['member.profilePhoto'])->firstOrCreate([
                'organisation_id' => $event->organisation_id,
                'member_id' => $member->id,
                'organisation_event_id' => $request->organisation_event_id,
                'organisation_event_session_id' => $request->organisation_event_session_id
            ]);

            if (!$attendee->wasRecentlyCreated) {
                $skipped[] = $member;
            } else {
                $attendees[] = $attendee;
            }
        }

        return compact('skipped', 'attendees');
    }
}
