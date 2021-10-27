<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\ContributionSummary;
use Illuminate\Http\Request;

/**
 * @group Contribution
 */
class ContributionSummaryReportController extends Controller
{
    /**
     * Report by Weekly Breakdown
     */
    public function breakdownByWeek(Request $request)
    {
        $month = null;
        $year = null;

        if (!$request->year && !$request->month) {
            $month = date('m');
            $year = Contribution::getLatestYears()->first()->year;
        } else {
            $month = $request->month;
            $year = $request->year;
        }

        return ContributionSummary::getByYear($year)->getByMonth($month)->with('currency')->selectRaw('week, currency_id, sum(amount) as amount')
            ->groupBy('week')->groupBy('currency_id')->orderBy('week')
            ->get()->transform(function ($d) {
            return [
                'amount' => $d->amount,
                'week' => $d->week,
                'currency_id' => $d->currency_id,
                'currency_code' => $d->currency ? $d->currency->currency_code : '',
            ];
        });
    }

    /**
     * Total of contributions by type
     */
    public function totalsByCategory(Request $request)
    {
        $year = null;

        if (!$request->year) {
            $year = Contribution::getLatestYears()->first()->year;
        } else {
            $year = $request->year;
        }

        return ContributionSummary::getByYear($year)->with('currency', 'contributionType')->selectRaw('module_contribution_type_id, month, currency_id, sum(amount) as amount')
            ->groupBy('month')->groupBy('module_contribution_type_id')->groupBy('currency_id')->orderBy('month')
            ->get()->transform(function ($d) {
            return [
                'amount' => $d->amount,
                'month' => $d->month,
                'contribution_type_id' => $d->module_contribution_type_id,
                'contribution_type_name' => $d->contributionType ? $d->contributionType->name : '',
                'currency_id' => $d->currency_id,
                'currency_code' => $d->currency ? $d->currency->currency_code : '',
            ];
        });
    }

    /**
     * Totals of contribution summaries by category
     */
    public function categoryBreakdown(Request $request)
    {
        $month = null;
        $year = null;

        if (!$request->year && !$request->month) {
            $month = date('m');
            $year = Contribution::getLatestYears()->first()->year;
        } else {
            $month = $request->month;
            $year = $request->year;
        }

        return ContributionSummary::getByYear($year)->getByMonth($month)->with('currency', 'contributionType')->selectRaw('module_contribution_type_id, currency_id, sum(amount) as amount')
            ->groupBy('module_contribution_type_id')->groupBy('currency_id')->orderBy('module_contribution_type_id')
            ->get()->transform(function ($d) {
            return [
                'amount' => $d->amount,
                'mont' => $d->month,
                'contribution_type_id' => $d->module_contribution_type_id,
                'contribution_type_name' => $d->contributionType ? $d->contributionType->name : '',
                'currency_id' => $d->currency_id,
                'currency_code' => $d->currency ? $d->currency->currency_code : '',
            ];
        });
    }
    
}
