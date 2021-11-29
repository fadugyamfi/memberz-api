<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Requests\TopContributorsRequest;
use App\Models\Contribution;

/**
 * @group Finance Reporting
 */
class TopContributorsController
{

    public function __invoke(TopContributorsRequest $request)
    {
        return Contribution::byYear($request->year)->byCurrencyId($request->currency_id)->whereNotNull('organisation_member_id')
            ->with(['organisationMember.member', 'currency'])
            ->selectRaw('currency_id, year, organisation_member_id, sum(amount) as total_amount, avg(amount) as avg_amount')
            ->groupBy('organisation_member_id')->groupBy('currency_id')->groupBy('year')
            ->orderBy('total_amount', 'desc')->orderBy('organisation_member_id')->orderBy('currency_id')->orderBy('year')
            ->limit(50)->get()
            ->transform(function ($d) {
                $org = $d->organisationMember;
                return [
                    'currency_code' => optional($d->currency)->currency_code,
                    'total_amount' => $d->total_amount,
                    'avg_amount' => $d->avg_amount,
                    'year' => $d->year,
                    'member_name' => $org ? $org->member->name : '',
                    'mobile_number' => $org ? $org->member->mobile_number : '',
                    'age' => $org ? $org->member->age : '',
                ];
            });

    }
}
