<?php

namespace App\Models;

use App\Traits\TenantOrganisationId;
use LaravelApiBase\Models\ApiModel as BaseApiModel;
use NunoMazer\Samehouse\Facades\Landlord;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class ApiModel extends BaseApiModel {

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    const DELETED_AT = 'active';

}
