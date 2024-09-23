<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Models\Organisation;
use App\Models\OrganisationMemberCategory;
use App\Models\SmsBroadcastList;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithDeletedFlag;
use NunoMazer\Samehouse\BelongsToTenants;

class EventReminder extends ApiModel
{

    use BelongsToTenants, HasCakephpTimestamps, LogModelActivity, SoftDeletesWithDeletedFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_event_reminders';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_event_id', 'minutes_before', 'reminder_dt', 'organisation_member_category_id', 'module_sms_broadcast_list_id', 'sms_message', 'created', 'modified', 'deleted'];

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
    protected $casts = [
        'reminder_dt' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['reminder_dt', 'created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function event() {
        return $this->belongsTo(Event::class, 'organisation_event_id');
    }

    public function broadcasts() {
        return $this->hasMany(EventReminderBroadcast::class, 'organisation_event_reminder_id');
    }

    public function membershipCategory() {
        return $this->belongsTo(OrganisationMemberCategory::class, 'organisation_member_category_id');
    }

    public function broadcastList() {
        return $this->belongsTo(SmsBroadcastList::class, 'module_sms_broadcast_list_id');
    }
}
