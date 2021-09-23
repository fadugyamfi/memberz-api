<?php

namespace App\Models;

use LaravelApiBase\Models\ApiModel as BaseApiModel;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ApiModel extends BaseApiModel {

    use LogsActivity;


    protected static $logTitle = "";
    protected static $logName = "";

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    const DELETED_AT = 'active';


    public function getActivitylogOptions(): LogOptions
    {
        $title = static::$logTitle;
        $name = static::$logName;

        return LogOptions::defaults()
        ->logAll()
        ->setDescriptionForEvent(fn(string $eventName) => ucfirst($eventName) . " {$title} - {$name}");
    }

}
