<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationEvent extends ApiModel  
{

    

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
    protected $casts = ['all_day' => 'boolean', 'registration_enabled' => 'boolean', 'attendee_self_reporting' => 'boolean', 'require_session_code' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_dt', 'end_dt', 'created', 'modified'];

}
