<?php

namespace App\Services\Events;

use App\Models\Events\Event;
use App\Models\Events\EventAttendee;
use DB;

class EventStatisticsService {

    public function attendanceByGender(Event $event) {
        return EventAttendee::query()
            ->join('organisation_event_sessions', 'organisation_event_sessions.id', '=', 'organisation_event_attendees.organisation_event_session_id')
            ->join('members', 'members.id', '=', 'organisation_event_attendees.member_id')
            ->select(
                'session_name',
                'session_dt',
                DB::raw('COUNT(organisation_event_attendees.member_id) as total_guests'),
                DB::raw("IFNULL(COUNT(CASE members.gender WHEN 'male' THEN members.id END), 0) as male_guests"),
                DB::raw("IFNULL(COUNT(CASE members.gender WHEN 'female' THEN members.id END), 0) as female_guests")
            )
            ->where('organisation_event_attendees.organisation_event_id', $event->id)
            ->groupBy('organisation_event_sessions.session_name')
            ->groupBy('organisation_event_sessions.session_dt')
            ->orderBy('organisation_event_sessions.session_dt')
            ->get();
    }

    public function attendanceByMembershipCategories(Event $event) {
        $results = EventAttendee::query()
            ->join('members', 'members.id', '=', 'organisation_event_attendees.member_id')
            ->join('organisation_event_sessions', 'organisation_event_sessions.id', '=', 'organisation_event_attendees.organisation_event_session_id')
            ->join('organisation_members', function($join) {
                $join->on('organisation_members.member_id', 'organisation_event_attendees.member_id')
                    ->whereRaw('organisation_members.organisation_id = organisation_event_attendees.organisation_id')
                    ->where('organisation_members.approved', 1)
                    ->where('organisation_members.active', 1);
            })
            ->join('organisation_member_categories', function($join) {
                $join->on('organisation_member_categories.id', 'organisation_members.organisation_member_category_id')
                    ->where('organisation_member_categories.active', 1);
            })
            ->where('organisation_event_attendees.organisation_event_id', $event->id)
            ->groupBy('organisation_member_categories.name')
            ->groupBy('organisation_event_sessions.session_name')
            ->groupBy('organisation_event_sessions.session_dt')
            ->orderBy('organisation_event_sessions.session_dt')
            ->select(
                'organisation_member_categories.name as category_name',
                'organisation_event_sessions.session_name',
                'organisation_event_sessions.session_dt',
                DB::raw('COUNT(organisation_event_attendees.member_id) as total_guests'),
                DB::raw("IFNULL(COUNT(CASE members.gender WHEN 'male' THEN members.id END), 0) as male_guests"),
                DB::raw("IFNULL(COUNT(CASE members.gender WHEN 'female' THEN members.id END), 0) as female_guests")
            )
            ->get();

        return $results->groupBy('session_name');
    }

    public function attendanceByGroups(Event $event) {
        $results = EventAttendee::query()
            ->join('members', 'members.id', '=', 'organisation_event_attendees.member_id')
            ->join('organisation_event_sessions', 'organisation_event_sessions.id', '=', 'organisation_event_attendees.organisation_event_session_id')
            ->join('organisation_members', function($join) {
                $join->on('organisation_members.member_id', 'organisation_event_attendees.member_id')
                    ->whereRaw('organisation_members.organisation_id = organisation_event_attendees.organisation_id')
                    ->where('organisation_members.approved', 1)
                    ->where('organisation_members.active', 1);
            })
            ->join('organisation_member_groups', 'organisation_member_groups.organisation_member_id', '=', 'organisation_members.id')
            ->join('organisation_groups', 'organisation_groups.id', '=', 'organisation_member_groups.organisation_group_id')
            ->join('organisation_group_types', 'organisation_group_types.id', '=', 'organisation_groups.organisation_group_type_id')
            ->where('organisation_event_attendees.organisation_event_id', $event->id)
            ->groupBy('organisation_groups.name')
            ->groupBy('organisation_group_types.name')
            ->groupBy('organisation_event_sessions.session_name')
            ->groupBy('organisation_event_sessions.session_dt')
            ->orderBy('organisation_event_sessions.session_dt')
            ->orderBy('organisation_group_types.name')
            ->orderBy('organisation_groups.name')
            ->select(
                'organisation_groups.name as group_name',
                'organisation_group_types.name as type_name',
                'organisation_event_sessions.session_name',
                'organisation_event_sessions.session_dt',
                DB::raw('COUNT(organisation_event_attendees.member_id) as total_guests'),
                DB::raw("IFNULL(COUNT(CASE members.gender WHEN 'male' THEN members.id END), 0) as male_guests"),
                DB::raw("IFNULL(COUNT(CASE members.gender WHEN 'female' THEN members.id END), 0) as female_guests")
            )
            ->get();

        return $results->groupBy(['session_name', 'type_name']);
    }
}
