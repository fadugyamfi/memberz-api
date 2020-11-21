<?php

namespace App\Http\Controllers;

use App\Models\OrganisationSetting;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Settings
 */
class OrganisationSettingController extends ApiController
{
    public function __construct(OrganisationSetting $organisationSetting) {
        parent::__construct($organisationSetting);
    }
}
