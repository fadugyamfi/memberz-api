<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithDeletedFlag;
use NunoMazer\Samehouse\BelongsToTenants;

class EventSession extends ApiModel
{

    use BelongsToTenants, HasCakephpTimestamps, LogModelActivity, SoftDeletesWithDeletedFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_event_sessions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_event_id', 'session_name', 'session_dt', 'organisation_event_attendee_count', 'organisation_event_interested_count', 'registration_code', 'created', 'modified', 'deleted'];

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
    protected $casts = ['deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['session_dt', 'created', 'modified'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function event() {
        return $this->belongsTo(Event::class, 'organisation_event_id');
    }

    public function attendees() {
        return $this->hasMany(EventAttendee::class, 'organisation_event_session_id');
    }
}
