<?php

namespace App\Http\Controllers;

use App\Models\ContributionType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Contributions
 */
class ContributionTypeController extends ApiController
{
    public function __construct(ContributionType $ContributionType) {
        parent::__construct($ContributionType);
    }
}
