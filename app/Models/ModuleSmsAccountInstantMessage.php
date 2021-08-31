<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class ModuleSmsAccountInstantMessage extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_account_instant_messages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['module_sms_account_id', 'member_id', 'to', 'message', 'bday_msg', 'sent_at', 'sent', 'sent_by', 'sent_status', 'created', 'modified', 'active'];

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
    protected $casts = ['bday_msg' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['sent_at', 'created', 'modified'];

}
