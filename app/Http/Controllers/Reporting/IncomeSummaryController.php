<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Requests\IncomeSummaryRequest;
use App\Models\Contribution;

/**
 * @group Finance Reporting
 */
class IncomeSummaryController
{

    public function __invoke(IncomeSummaryRequest $request)
    {
        return Contribution::whereBetween('created', [$request->start_date, $request->end_date])->byCurrencyId($request->currency_id)
            ->with(['contributionType', 'contributionPaymentType', 'currency'])
            ->selectRaw('module_contribution_type_id, currency_id, module_contribution_payment_type_id, sum(amount) as amount')
            ->groupBy('module_contribution_type_id')->groupBy('module_contribution_payment_type_id')->groupBy('currency_id')
            ->orderBy('module_contribution_type_id')->orderBy('module_contribution_payment_type_id')->orderBy('currency_id')
            ->get()->transform(function ($d) {
            return [
                'contribution_type_name' => optional($d->contributionType)->name,
                'payment_type_name' => optional($d->contributionPaymentType)->name,
                'currency_code' => optional($d->currency)->currency_code,
                'amount' => $d->amount
            ];
        });
    }
}
