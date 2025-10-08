<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganisationMemberResource;
use App\Models\OrganisationMemberAnniversary;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * @group Membership Anniversary
 */
class AnniversaryController extends Controller
{
    public function index(Request $request) {
        $limit = $request->limit ?? 30;

        $query = OrganisationMemberAnniversary::query()
            // ->join('organisation_members', 'organisation_members.id', '=', 'organisation_member_anniversaries.organisation_member_id')
            // ->join('members', 'members.id', '=', 'organisation_members.member_id')
            // ->selectRaw('organisation_members.*')
            ->selectRaw('*')
            ->selectRaw('YEAR(value) as `anniversary_year`')
            ->selectRaw('MONTH(value) as `anniversary_month`')
            ->selectRaw('DAY(value) as `anniversary_date`');

        if( $request->organisation_anniversary_id ) {
            $query->where('organisation_anniversary_id', $request->organisation_anniversary_id);
        }

        if( $request->year ) {
            $query->where(DB::raw('YEAR(value)'), $request->year);
        }

        if( $request->month ) {
            $query->where(DB::raw('MONTH(value)'), $request->month);
        }

        if( $request->day ) {
            $query->where(DB::raw('DAY(value)'), $request->day);
        }

        $anniversaries = $query->orderBy('anniversary_date', 'asc')
            // ->orderBy('members.last_name', 'asc')
            ->with('organisationMember.member')
            ->paginate($limit);

        return response()->json($anniversaries);
    }

    /**
     * Get Members with Anniversary
     */
    public function getMembersWithAnniversary() {
        $members = OrganisationMemberAnniversary::getMembersWithAnniversary();

        return response()->json([
            'data' => OrganisationMemberResource::collection($members)
        ]);
    }
}