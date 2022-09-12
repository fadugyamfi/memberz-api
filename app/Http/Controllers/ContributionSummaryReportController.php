<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\ContributionReceiptSetting;
use App\Models\ContributionSummary;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @group Contribution Summary Reports
 */
class ContributionSummaryReportController extends Controller
{

    /**
     * Get Contribution Summaries
     */
    public function index(Request $request) {

        $year = $request->year ?? date('Y');
        $month = date('m');
        $week = Carbon::now()->weekOfMonth;
        $receiptSettings = ContributionReceiptSetting::latest()->first();
        $currency = $receiptSettings?->defaultCurrency ?? Currency::find(80);

        $baseQuery = ContributionSummary::getByYear($year)->getByCurrencyId($currency->id);

        $yearTotal = $baseQuery->sum('amount');
        $monthTotal = $baseQuery->getByMonth($month)->sum('amount');
        $weekTotal = $baseQuery->getByMonth($month)->getByWeek($week)->sum('amount');
        $todayTotal = ContributionSummary::whereDate('receipt_dt', date('Y-m-d'))->sum('amount');

        return response()->json([
            'currency' => $currency,
            'year' => $yearTotal,
            'month' => $monthTotal,
            'week' => $weekTotal,
            'today' => $todayTotal
        ]);
    }

    /**
     * Report by Weekly Breakdown
     */
    public function breakdownByWeek(Request $request)
    {
        $month = null;
        $year = null;

        if (! $request->year) {
            $year = Contribution::getLatestYears()->first()->year;
        } else {
            $year = $request->year;
        }

        if (! $request->month){
            $month = date('m');
        } else {
            $month = $request->month;
        }

        return ContributionSummary::getByYear($year)->getByMonth($month)->with('currency')->selectRaw('week, currency_id, sum(amount) as amount')
            ->groupBy('week')->groupBy('currency_id')->orderBy('week')
            ->get()
            ->transform(function ($d) {
                return [
                    'amount' => $d->amount,
                    'week' => $d->week,
                    'currency_id' => $d->currency_id,
                    'currency_code' => $d->currency ? $d->currency->currency_code : '',
                ];
            });
    }

    /**
     * Total Contributions By Type
     */
    public function totalsByCategory(Request $request)
    {
        $year = null;

        if (!$request->year) {
            $year = Contribution::getLatestYears()->first()->year;
        } else {
            $year = $request->year;
        }

        return ContributionSummary::getByYear($year)
            ->with('currency', 'contributionType')
            ->selectRaw('module_contribution_type_id, currency_id, sum(amount) as amount')
            ->groupBy('module_contribution_type_id')->groupBy('currency_id')->orderBy('module_contribution_type_id')->orderBy('currency_id')
            ->get()
            ->transform(function ($d) {
                return [
                    'amount' => $d->amount,
                    'contribution_type_id' => $d->module_contribution_type_id,
                    'contribution_type_name' => $d->contributionType ? $d->contributionType->name : '',
                    'currency_id' => $d->currency_id,
                    'currency_code' => $d->currency ? $d->currency->currency_code : '',
                ];
            });
    }

    /**
     * Contribution Trends
     */
    public function getTrendReport(Request $request){
        $year = $request->year ?? Contribution::getLatestYears()->first()->year;

        $query = ContributionSummary::getByYear($year);

        if( $request->contribution_type_id ) {
            $query->getByContributionTypeId($request->contribution_type_id);
        }

        return $query
            ->with('currency')
            ->selectRaw('month, currency_id, sum(amount) as amount')
            ->groupBy('month')
            ->groupBy('currency_id')
            ->orderBy('month')
            ->orderBy('currency_id')
            ->get()
            ->transform(function ($d) {
                return [
                    'amount' => $d->amount,
                    'month' => $d->month,
                    'currency_id' => $d->currency_id,
                    'currency_code' => $d->currency ? $d->currency->currency_code : '',
                ];
            });
    }

    /**
     * Contribution Summaries By Category
     */
    public function categoryBreakdown(Request $request)
    {
        $month = null;
        $year = null;

        if (! $request->year) {
            $year = Contribution::getLatestYears()->first()->year;
        } else {
            $year = $request->year;
        }

        if (! $request->month){
            $month = date('m');
        } else {
            $month = $request->month;
        }

        return ContributionSummary::getByYear($year)
            ->getByMonth($month)->with('currency', 'contributionType')
            ->selectRaw('module_contribution_type_id, currency_id, sum(amount) as amount')
            ->groupBy('module_contribution_type_id')
            ->groupBy('currency_id')
            ->orderBy('module_contribution_type_id')
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

}
