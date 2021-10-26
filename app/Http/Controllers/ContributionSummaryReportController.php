<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionSummaryReportRequest;
use App\Models\ContributionSummary;

/**
 * @group Contribution
 */
class ContributionSummaryReportController extends Controller
{
    /**
     * Find Contribution Summary Report
     */
    public function __invoke(ContributionSummaryReportRequest $request)
    {

        if (!$request->month) {
            return ContributionSummary::getReportByYear($request->year, $request->contribution_type_id)->get()->transform(function ($d) {
                return [
                    'contribution_type' => $d->contributionType->name,
                    'month' => $d->month,
                    'year' => $d->year,
                    'amount' => $d->amount,
                    'currency_code' => $d->currency->currency_code,
                ];
            });
        }

        return ContributionSummary::getReportByMonthYear($request->month, $request->year, $request->contribution_type_id)->get()->transform(function ($d) {
            return [
                'contribution_type' => $d->contributionType->name,
                'month' => $d->month,
                'year' => $d->year,
                'amount' => $d->amount,
                'currency_code' => $d->currency->currency_code,
            ];
        });
    }
}
