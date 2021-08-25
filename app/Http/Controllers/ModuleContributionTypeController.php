<?php

namespace App\Http\Controllers;

use App\Models\ModuleContributionType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisations
 */
class ModuleContributionTypeController extends ApiController
{
    public function __construct(ModuleContributionType $moduleContributionType) {
        parent::__construct($moduleContributionType);
    }
}
