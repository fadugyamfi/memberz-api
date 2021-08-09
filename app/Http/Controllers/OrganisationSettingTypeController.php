<?php

namespace App\Http\Controllers;

use App\Models\OrganisationSettingType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Setting Types
 */
class OrganisationSettingTypeController extends ApiController
{
    public function __construct(OrganisationSettingType $organisationSettingType) {
        parent::__construct($organisationSettingType);
    }
}
