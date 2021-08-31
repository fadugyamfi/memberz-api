<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationEventReminder extends ApiModel  
{

    

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
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['reminder_dt', 'created', 'modified'];

}
