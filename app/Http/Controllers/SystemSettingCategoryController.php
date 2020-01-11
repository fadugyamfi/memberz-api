<?php 

namespace App\Http\Controllers;

use App\Models\SystemSettingCategory;
use LaravelApiBase\Http\Controllers\ApiController;

class SystemSettingCategoryController extends ApiController
{
    public function __construct(SystemSettingCategory $systemSettingCategory) {
        parent::__construct($systemSettingCategory);
    }
}