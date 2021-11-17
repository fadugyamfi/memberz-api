<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Requests\TopContributorsRequest;

/**
 * @group Finance Reporting
 */
class TopContributorsController
{

    public function __invoke(TopContributorsRequest $request)
    {
        return [];
    }
}
