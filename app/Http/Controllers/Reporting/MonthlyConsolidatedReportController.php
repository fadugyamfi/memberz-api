<?php
namespace App\Http\Controllers\Reporting;

use App\Http\Requests\MonthlyConsolidatedReportRequest;
use App\Models\Contribution;
use App\Models\ContributionSummary;

/**
 * @group Finance Reporting
 */
class MonthlyConsolidatedReportController
{

    public function __invoke(MonthlyConsolidatedReportRequest $request)
    {
        $byContributionTypes = ContributionSummary::getByCurrencyId($request->currency_id)
            ->getByYear($request->year)
            ->with(['contributionType', 'currency'])
            ->selectRaw('month, currency_id, module_contribution_type_id, sum(amount) as amount')
            ->groupBy('month')->groupBy('module_contribution_type_id')->groupBy('currency_id')
            ->orderBy('month')->orderBy('module_contribution_type_id')
            ->get()
            ->transform(function ($d) {
                return [
                    'month' => $d->month,
                    'amount' => $d->amount,
                    'contribution_type_id' => $d->module_contribution_type_id,
                    'contribution_type_name' => optional($d->contributionType)->name,
                    'currency_id' => $d->currency_id,
                    'currency_code' => $d->currency->currency_code
                ];
            });

        $byPaymentTypes = Contribution::byYear($request->year)->byCurrencyId($request->country_id)
            ->with(['contributionPaymentType', 'currency'])
            ->selectRaw('month, module_contribution_payment_type_id, sum(amount) as amount')
            ->groupBy('month')->groupBy('module_contribution_payment_type_id')->orderBy('month')->orderBy('module_contribution_payment_type_id')
            ->get()->transform(function ($d) {
            return [
                'month' => $d->month,
                'amount' => $d->amount,
                'payment_type_id' => $d->module_contribution_payment_type_id,
                'payment_type_name' => optional($d->contributionPaymentType)->name,
                'currency_code' => optional($d->currency)->currency_code,
            ];
        });

        return [
            'contributionTypesData' => $byContributionTypes,
            'paymentTypesData' => $byPaymentTypes,
        ];
    }
}
