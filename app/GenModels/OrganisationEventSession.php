<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationEventSession extends ApiModel  
{

    

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

}
