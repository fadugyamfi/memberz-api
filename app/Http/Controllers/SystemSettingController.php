<?php 

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use LaravelApiBase\Http\Controllers\ApiController;

class SystemSettingController extends ApiController
{
    public function __construct(SystemSetting $systemSetting) {
        parent::__construct($systemSetting);
    }
}