<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganisationMemberResource;
use App\Models\OrganisationMember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Birthdays
 */
class BirthdayController extends Controller
{

    public function index(Request $request) {
        $limit = $request->limit ?? 30;

        $query = OrganisationMember::join('members', 'members.id', '=', 'organisation_members.member_id')
            ->selectRaw('organisation_members.*')
            ->selectRaw('YEAR(dob) as `dob_year`')
            ->selectRaw('MONTH(dob) as `dob_month`')
            ->selectRaw('DAY(dob) as `dob_date`');

        if( $request->start_date && $request->end_date ) {
            $query->whereBetween('dob', [$request->start_date, $request->end_date]);
        }

        if( $request->organisation_member_category_id ) {
            $query->where('organisation_member_category_id', $request->organisation_member_category_id);
        }

        if( $request->year ) {
            $query->where(DB::raw('YEAR(dob)'), $request->year);
        }

        if( $request->month ) {
            $query->where(DB::raw('MONTH(dob)'), $request->month);
        }

        if( $request->day ) {
            $query->where(DB::raw('DAY(dob)'), $request->day);
        }

        // week of year
        if( $request->week ) {
            $query->where(DB::raw('WEEK(dob)'), $request->week);
        }

        if( $request->as_count ) {
            return response()->json(['count' => $query->count()]);
        }



        $birthdays = $query->orderBy('dob_date', 'asc')
            ->orderBy('members.last_name', 'asc')
            ->with('member')
            ->paginate($limit);

        return OrganisationMemberResource::collection($birthdays);
    }

    /**
     * Birthday Summary
     *
     * Get quick information about birthdays happening with the current month
     */
    public function summary(Request $request) {
        $dob = DB::table('members')
            ->selectRaw('id as member_id, dob, MONTH(dob) as months, MONTHNAME(dob) as monthnames, DAY(dob) as days, WEEK(dob) as weeks')
            ->whereNotNull('dob')
            ->whereDate('dob', '>=', '1900-01-01');

        $summary = OrganisationMember::query()
            ->joinSub($dob, 'dob_data', function($join) {
                $join->on('organisation_members.member_id', '=', 'dob_data.member_id');
            })
            ->where('dob_data.months', Carbon::now()->month)
            ->selectRaw('SUM(IF(dob_data.months = ?, 1, 0)) as this_month', [Carbon::now()->month])
            ->selectRaw('SUM(IF(dob_data.days = ?, 1, 0)) as today', [Carbon::now()->day])
            ->selectRaw('SUM(IF(dob_data.weeks = ?, 1, 0)) as this_week', [Carbon::now()->week])
            ->selectRaw('SUM(IF(dob_data.days = ?, 1, 0)) as tomorrow', [Carbon::now()->tomorrow()->day])
            ->get();

        return response()->json( $summary->first() );
    }
}
