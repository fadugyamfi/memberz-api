<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Http\Requests\OrganisationRequest;
use App\Http\Resources\OrganisationResource;
use App\Models\MemberAccount;
use App\Models\Organisation;
use DB;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisations
 */
class OrganisationController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(Organisation $organisation)
    {
        $this->setApiModel($organisation);
        $this->setApiFormRequest(OrganisationRequest::class);
        $this->setApiResource(OrganisationResource::class);
    }

    /**
     * Create Organisation
     */
    public function store(OrganisationCreationRequest $request) {
        return $this->apiStore($request);
    }

    /**
     * Update Organisation
     */
    public function update(OrganisationRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }

    /**
     * Get Organisation By Slug
     *
     * @group Membership Registration
     */
    public function getBySlug($slug) {
        $organisation = Organisation::where('slug', $slug)->first();

        if( !$organisation ) {
            return response()->json(['message' => 'Organisation not found'], 404);
        }

        return new OrganisationResource($organisation);
    }

    /**
     * Get Organisation Slugs
     */
    public function slugs() {
        $slugs = Organisation::where('active', 1)->select('slug')->get()->pluck('slug');

        return response()->json(['data' => $slugs]);
    }

    /**
     * Get Recommended Organisations
     *
     * Returns a short list of organisations that one can join. Current criteria is to
     * return the 10 most recently updated organisations with more than 25 members
     */
    public function recommended() {
        $threshold = now()->subDays(365)->format('Y-m-d');

        $organisations = Organisation::query()
            ->join('organisation_members', 'organisation_members.organisation_id', '=', 'organisations.id')
            ->select(
                'organisations.*',
                DB::raw('count(organisation_members.id) as membership_count'),
                DB::raw('max(organisation_members.modified) as recent_membership')
            )
            ->when(auth()->check(), function($query) {
                /** @var MemberAccount $user */
                $user = auth()->user();
                $userOrganisationIds = $user->memberships()->get()->pluck('organisation_id');
                $query->whereNotIn('organisation_members.organisation_id', $userOrganisationIds);
            })
            ->groupBy(DB::raw('organisations.id'))
            ->having('membership_count', '>', 5)
            // ->havingRaw(DB::raw("DATE(recent_membership) > '{$threshold}'"))
            ->limit(10)
            ->with(['organisationType'])
            ->get();

        return response()->json($organisations);
    }
}
