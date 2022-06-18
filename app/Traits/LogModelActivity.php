<?php

namespace App\Traits;

use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait LogModelActivity {

    use LogsActivity, TenantOrganisationId;

    protected static $logTitle = "";
    protected static $logName = "";

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
        if( !$this->getTenantOrganisationId() || !isset($_SERVER['REMOTE_ADDR']) ) {
            return;
        }

        $activity->ip_address = $_SERVER['REMOTE_ADDR'];
        $activity->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $activity->organisation_id = $this->getTenantOrganisationId();
    }
}
