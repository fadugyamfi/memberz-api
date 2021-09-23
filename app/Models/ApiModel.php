<?php

namespace App\Models;

use LaravelApiBase\Models\ApiModel as BaseApiModel;
// use Spatie\Activitylog\Traits\LogsActivity;

class ApiModel extends BaseApiModel {

    // use LogsActivity;

    // protected static $logAttributes = "*";
    // protected static $logTitle = "";
    // protected static $logName = "";

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    const DELETED_AT = 'active';

    public function getDescriptionForEvent(string $eventName)
    {
        // $title = static::$logTitle;
        // $name = static::$logName;
  
        // return ucfirst($eventName) . " {$title} - {$name}"; 
    }
}
