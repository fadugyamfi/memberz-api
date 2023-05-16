<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Models\Member;
use App\Models\OrganisationMember;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class EventAttendee extends ApiModel
{

    use BelongsToTenants, HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_event_attendees';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_event_id', 'organisation_event_session_id', 'member_id', 'interested', 'attended', 'created', 'modified', 'deleted'];

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
    protected $casts = ['interested' => 'boolean', 'attended' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function event() {
        return $this->belongsTo(Event::class, 'organisation_event_id');
    }

    public function session() {
        return $this->belongsTo(EventSession::class, 'organisation_event_session_id');
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function membership() {
        return $this->hasOne(OrganisationMember::class, 'member_id', 'member_id')->where(['active' => 1, 'approved' => 1]);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $member = $this->member;
        $session = $this->session;
        $event = $this->event;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("events")
            ->setDescriptionForEvent(function(string $eventName) use($member, $session, $event) {
                if( $eventName == 'created' ) {
                    return __("Marked :name as an attendee to the :session_name session of :event_name event", [
                        "session_name" => $session->session_name,
                        "name" => $member->name,
                        "event_name" => $event->event_name
                    ]);
                }

                if( $eventName == 'deleted' ) {
                    return __("Unmarked :name as an attendee to the :session_name session of :event_name event", [
                        "session_name" => $session->session_name,
                        "name" => $member->name,
                        "event_name" => $event->event_name
                    ]);
                }
            });
    }
}
