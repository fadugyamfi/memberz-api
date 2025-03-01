<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Models\Organisation;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use Carbon\Carbon;
use Database\Factories\Events\EventFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class Event extends ApiModel
{

    use BelongsToTenants, HasCakephpTimestamps, LogModelActivity, SoftDeletesWithActiveFlag, HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_events';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_calendar_id', 'event_name', 'slug', 'short_description', 'long_description', 'photo', 'photo_thumb', 'start_dt', 'end_dt', 'all_day', 'venue', 'gps_location', 'cost', 'currency_id', 'registration_enabled', 'capacity', 'attendee_self_reporting', 'require_session_code', 'organisation_event_attendee_count', 'organisation_event_interested_count', 'created', 'modified', 'active'];

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
        'all_day' => 'boolean', 
        'registration_enabled' => 'boolean', 
        'attendee_self_reporting' => 'boolean', 
        'require_session_code' => 'boolean', 
        'active' => 'boolean',
        'start_dt' => 'datetime',
        'end_dt' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_dt', 'end_dt', 'created', 'modified'];


    protected $appends = ['photo_url'];



    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function calendar() {
        return $this->belongsTo(Calendar::class, 'organisation_calendar_id');
    }

    public function sessions() {
        return $this->hasMany(EventSession::class, 'organisation_event_id');
    }

    public function attendees() {
        return $this->hasMany(EventAttendee::class, 'organisation_event_id');
    }

    public function registrations() {
        return $this->hasMany(EventRegistration::class, 'organisation_event_id');
    }

    public function reminders() {
        return $this->hasMany(EventReminder::class, 'organisation_event_id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return EventFactory::new();
    }

    public function getActivitylogOptions(): LogOptions
    {
        $sessions = $this->sessions;
        $event = $this;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("events")
            ->setDescriptionForEvent(function(string $eventName) use($event) {
                if( $eventName == 'created' ) {
                    return __("Created event :event_name", [
                        "event_name" => $event->event_name
                    ]);
                }

                if( $eventName == 'updated' ) {
                    return __("Updated event :event_name", [
                        "event_name" => $event->event_name
                    ]);
                }

                if( $eventName == 'deleted' ) {
                    return __("Deleted event :event_name", [
                        "event_name" => $event->event_name
                    ]);
                }
            });
    }

    public function scopeUpcoming(Builder $query) {
        $query->whereDate('start_dt', '>', now()->format('Y-m-d'))
            ->orWhereDate('end_dt', '>=', now()->format('Y-m-d'));
    }

    public function scopePast(Builder $query) {
        $query->whereDate('end_dt', '<=', now()->format('Y-m-d'));
    }


    public function getPhotoUrlAttribute() {
        if ( str_contains($this->photo, 'storage') ) {
            return url($this->photo);
        }

        // old server implements
        $save_dir_root = config('app.old_file_upload_root_directory');
        $host_server = config('app.old_file_upload_host_server');

        return "{$host_server}{$save_dir_root}/{$this->photo}";
    }
}
