<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class MemberAccountSession extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member_account_sessions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['member_account_id', 'session_start_dt', 'session_expiry_dt', 'session_device_id', 'session_last_ip', 'session_user_agent', 'created', 'modified', 'active'];

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
    protected $dates = ['session_start_dt', 'session_expiry_dt', 'created', 'modified'];

}
