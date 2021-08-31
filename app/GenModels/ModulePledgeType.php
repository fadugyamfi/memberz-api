<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class ModulePledgeType extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_pledge_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'currency_id', 'min_amount', 'target_amount', 'target_dt', 'reminder_message', 'reminder_start_dt', 'reminder_end_dt', 'next_reminder_dt', 'send_reminder_sms', 'reminder_frequency', 'total_pledged', 'total_redeemed', 'total_remaining', 'created', 'modified', 'active'];

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
    protected $casts = ['send_reminder_sms' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['target_dt', 'reminder_start_dt', 'reminder_end_dt', 'next_reminder_dt', 'created', 'modified'];

}
