<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Models\SmsBroadcast;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;

class EventReminderBroadcast extends ApiModel
{

    use HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_event_reminder_broadcasts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_event_reminder_id', 'module_sms_account_broadcast_id', 'created', 'modified'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function eventReminder() {
        return $this->belongsTo(EventReminder::class, 'organisation_event_reminder_id');
    }

    public function smsBroadcast() {
        return $this->belongsTo(SmsBroadcast::class, 'module_sms_account_broadcast_id');
    }
}
