<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Requests\IncomeSummaryRequest;
use App\Models\Contribution;

/**
 * @group Finance Reporting
 */
class IncomeSummaryController
{

    /**
     * Income Summary Report
     */
    public function __invoke(IncomeSummaryRequest $request)
    {
        return Contribution::whereBetween('module_member_contributions.created', [$request->start_date, $request->end_date])
            ->byCurrencyId($request->currency_id)
            ->with(['contributionPaymentType', 'currency'])
            ->selectRaw('module_contribution_types.name, module_contribution_payment_type_id, module_member_contributions.currency_id, sum(amount) as amount')
            ->join('module_contribution_types', 'module_contribution_types.id', '=', 'module_contribution_type_id')
            ->groupBy('module_contribution_types.name')
            ->groupBy('module_contribution_payment_type_id')
            ->groupBy('module_member_contributions.currency_id')
            ->orderBy('module_contribution_types.name')
            ->orderBy('module_contribution_payment_type_id')
            ->get()
            ->transform(function ($d) {
                return [
                    'contribution_type_name' => $d->name,
                    'payment_type_name' => $d->contributionPaymentType?->name,
                    'currency_code' => optional($d->currency)->currency_code,
                    'amount' => $d->amount,
                    'currency_code' => $d->currency?->currency_code,
                ];
            });
    }
}
