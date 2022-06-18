<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Models\OrganisationMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Members
 */
class OrganisationMemberController extends ApiController
{
    public function __construct(OrganisationMember $organisationMember)
    {
        parent::__construct($organisationMember);
    }

    /**
     * Delete Membership
     */
    public function destroy($id)
    {
        $model = $this->Model::find($id);

        if ($model) {
            $model->active = 0;
            $model->approved = 0;
            $model->save();

            return response()->json(['data' => $model]);
        }

        return response()->json(['error' => 'Could not find member record to delete'], 404);
    }

    // public function showByUuid(Request $request, $uuid) {
    //     $membership = OrganisationMember::where('uuid', $uuid)->first();
    // }

    /**
     * Basic Statistics
     *
     * Returns a basic set of statistics about memberships
     */
    public function statistics(int $organisation_id)
    {

        $data = $this->Model::join(
            'organisation_member_categories',
            'organisation_member_categories.id', '=',
            'organisation_members.organisation_member_category_id'
        )
        ->select(
            DB::raw('organisation_member_categories.name as category_name'),
            DB::raw('count(organisation_members.id) as total')
        )
        ->groupBy('category_name')
        ->where('organisation_members.organisation_id', $organisation_id)
        ->get();

        return response()->json(['data' => $data]);
    }

    /**
     * Unapproved Registrations
     *
     * Returns a list of unapproved registrations
     */
    public function unapproved(Request $request)
    {
        $limit = $request->limit ?? 15;
        $registration_form_id = $request->input('registration_form_id');

        $members = OrganisationMember::unapproved()->registeredWith($registration_form_id)
            ->with(['member', 'organisationMemberCategory', 'organisationRegistrationForm'])
            ->orderBy('created', 'desc')
            ->paginate($limit);

        return $this->Resource::collection($members);
    }

    /**
     * Registration Form Registrants
     *
     * @group Membership Registration
     */
    public function registrant($org_slug, $membership_id, Request $request) {
        return $this->show($request, $membership_id);
    }
}
