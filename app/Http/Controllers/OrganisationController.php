<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Http\Requests\OrganisationRequest;
use App\Http\Resources\OrganisationResource;
use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationMember;
use DB;
use Illuminate\Http\Request;
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

    /**
     * Get Organisations For Auto Complete List
     *
     * Returns a short list of organisations that one can join. Current criteria is to
     * return the 10 most recently updated organisations with more than 25 members
     */
    public function list(Request $request) {

        $limit = $request->input('limit') ?? 30;
        $term = $request->input('term');

        $organisations = Organisation::query()
            ->with([
                'organisationType', 
                'memberAccount.member:id,first_name,last_name,mobile_number,email,dob'
            ])
            ->select('id', 'name', 'phone', 'email', 'member_account_id', 'logo', 'uuid')
            ->where('name', 'LIKE', "%{$term}%")
            ->limit($limit)
            ->orderBy('name')
            ->get()
            ->map(function(Organisation $organisation) {
                return [
                    'id' => $organisation->id,
                    'name' => $organisation->name,
                    'phone' => $organisation->phone,
                    'email' => $organisation->email,
                    'member_account' => $organisation->memberAccount,
                    'logo' => $organisation->logo,
                    'uuid' => $organisation->uuid,
                    'membership' => OrganisationMember::where('organisation_id', $organisation->id)
                        ->where('member_id', $organisation->memberAccount?->member_id)
                        ->with(['member:id,first_name,last_name,mobile_number,email,dob'])
                        ->first()
                ];
            });

        return response()->json(['data' => $organisations]);
    }
}
