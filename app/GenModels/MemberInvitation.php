<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class MemberInvitation extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member_invitations';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['invite_type', 'member_id', 'member_account_id', 'organisation_id', 'send_email', 'send_sms', 'email_sent', 'sms_sent', 'accepted', 'declined', 'responded', 'created', 'modified', 'deleted'];

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
    protected $casts = ['send_email' => 'boolean', 'send_sms' => 'boolean', 'email_sent' => 'boolean', 'sms_sent' => 'boolean', 'accepted' => 'boolean', 'declined' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['responded', 'created', 'modified'];

}
