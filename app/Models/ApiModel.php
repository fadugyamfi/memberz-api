<?php

namespace App\Models;

use LaravelApiBase\Models\ApiModel as BaseApiModel;
use NunoMazer\Samehouse\Facades\Landlord;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

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

    /**
     * Define tap operations on Activity before activity log
     */
    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->ip_address = $_SERVER['REMOTE_ADDR'];
        $activity->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $activity->organisation_id = Landlord::getTenantId();
    }

}
