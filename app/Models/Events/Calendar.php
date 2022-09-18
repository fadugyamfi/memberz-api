<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Models\Organisation;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithDeletedFlag;
use Database\Factories\Events\CalendarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use NunoMazer\Samehouse\BelongsToTenants;

class Calendar extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithDeletedFlag, HasCakephpTimestamps, LogModelActivity, HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_calendars';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'color', 'organisation_event_count', 'is_default', 'fetch_events_on_load', 'show_publicly', 'created', 'modified', 'deleted'];

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
    protected $casts = ['is_default' => 'boolean', 'fetch_events_on_load' => 'boolean', 'show_publicly' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CalendarFactory::new();
    }
}
