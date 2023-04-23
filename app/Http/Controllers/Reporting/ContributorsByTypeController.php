<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Requests\ContributorsByTypeRequest;
use App\Models\Contribution;

/**
 * @group Finance Reporting
 */
class ContributorsByTypeController
{

    /**
     * Top Contributors
     */
    public function __invoke(ContributorsByTypeRequest $request)
    {
        $limit = $request->limit ?? 200;

        return Contribution::whereBetween('module_member_contributions.created', [$request->start_date, $request->end_date])
            ->when($request->year, fn($q) => $q->byYear($request->year)->groupBy('year')->select('year'))
            ->byCurrencyId($request->currency_id)
            ->byContributionType($request->contribution_type_id)
            ->whereNotNull('organisation_member_id')
            ->with(['organisationMember.member', 'organisationMember.category', 'currency', 'contributionType'])
            ->selectRaw('module_contribution_type_id, currency_id, organisation_member_id, sum(amount) as total_amount, avg(amount) as avg_amount, max(created) as last_contribution_date')
            ->groupBy('organisation_member_id')
            ->groupBy('currency_id')
            ->groupBy('module_contribution_type_id')
            ->orderBy('total_amount', 'desc')
            ->orderBy('organisation_member_id')
            ->orderBy('currency_id')
            ->limit($limit)
            ->get()
            ->transform(function ($d) {
                $org = $d->organisationMember;
                return [
                    'organisation_no' => $org?->organisation_no,
                    'membership_category_name' => $org?->category?->name,
                    'organisation_member_id' => $org?->id,
                    'currency_code' => $d->currency?->currency_code,
                    'total_amount' => $d->total_amount,
                    'avg_amount' => $d->avg_amount,
                    'year' => $d->year,
                    'member_name' => $org?->member->name,
                    'mobile_number' => $org?->member->mobile_number,
                    'age' => $org?->member->age,
                    'last_contribution_date' => $d->last_contribution_date,
                    'module_contribution_type_id' => $d->module_contribution_type_id,
                    'contribution_type_name' => $d->contributionType->name
                ];
            });

    }
}
