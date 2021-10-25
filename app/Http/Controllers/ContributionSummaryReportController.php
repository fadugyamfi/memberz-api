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

    // public function __invoke(ContributionSummaryReportRequest $request)
    // {

    //     if (!$request->month) {
    //         return ContributionSummary::getReportByYear($request->year, $request->contribution_type_id)->get()->transform(function ($d) {
    //             return [
    //                 'contribution_type' => $d->contributionType->name,
    //                 'month' => $d->month,
    //                 'year' => $d->year,
    //                 'amount' => $d->amount,
    //                 'currency_code' => $d->currency->currency_code,
    //             ];
    //         });
    //     }

    //     return ContributionSummary::getReportByMonthYear($request->month, $request->year, $request->contribution_type_id)->get()->transform(function ($d) {
    //         return [
    //             'contribution_type' => $d->contributionType->name,
    //             'month' => $d->month,
    //             'year' => $d->year,
    //             'amount' => $d->amount,
    //             'currency_code' => $d->currency->currency_code,
    //         ];
    //     });
    // }

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
}
