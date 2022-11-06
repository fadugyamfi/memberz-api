<?php

namespace App\Http\Controllers;

use App\Models\Events\Event;
use App\Models\Member;
use App\Models\Organisation;
use App\Models\OrganisationMember;
use LaravelApiBase\Http\Controllers\ApiController;
use Request;

/**
 * @group Member Profiles
 */
class MemberController extends ApiController
{
    public function __construct(Member $member) {
        parent::__construct($member);
    }

    /**
     * Membership Organisations
     *
     * @urlParam id integer ID of profile. Example: 1
     *
     * @response 404 {"error" => "Profile Not Found"}
     */
    public function organisations(Request $request, int $member_id) {

        $profile = Member::find($member_id);
        $limit = $request->limit ?? 15;

        if( !$profile ) {
            return response()->json(['error' => 'Profile Not Found'], 404);
        }

        $organisation_ids = $profile->memberships->pluck('organisation_id');

        $organisations = Organisation::whereIn('id', $organisation_ids)->with([
            'activeSubscription' => function($query) {
                return $query->with(['subscriptionType', 'organisationInvoice.transactionType']);
            },
            'organisationType'
        ])
        ->withCount(['organisationMembers'])
        ->orderBy('name', 'asc')
        ->paginate($limit);

        return $this->Resource::collection($organisations);
    }

    /**
     * Member Memberships
     *
     * @urlParam id integer ID of profile. Example: 1
     *
     * @response 404 {"error" => "Profile Not Found"}
     */
    public function memberships(Request $request, int $member_id) {

        $memberships = OrganisationMember::query()
            ->where('member_id', $member_id)
            ->with(['organisation', 'category', 'organisationMemberCategory'])
            ->get();

        return $this->Resource::collection($memberships);
    }

    public function upcomingEvents(Request $request, int $member_id) {
        $limit = 10;

        $profile = Member::findOrFail($member_id);

        $organisation_ids = $profile->memberships->pluck('organisation_id');

        $events = Event::upcoming()
            ->whereIn('organisation_id', $organisation_ids)
            ->with(['organisation', 'sessions', 'calendar'])
            ->withCount(['attendees', 'sessions'])
            ->oldest('start_dt')
            ->paginate($limit);

        return $this->Resource::collection($events);
    }
}
