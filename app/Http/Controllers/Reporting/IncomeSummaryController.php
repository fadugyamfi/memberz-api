<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Requests\IncomeSummaryRequest;

/**
 * @group Finance Reporting
 */
class IncomeSummaryController
{

    public function __invoke(IncomeSummaryRequest $request)
    {
        return [];
    }
}
