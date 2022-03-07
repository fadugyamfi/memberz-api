<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

class SystemSettingController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(SystemSetting $setting)
    {
        $this->setApiModel($setting);
    }
}
