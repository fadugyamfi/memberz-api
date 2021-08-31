<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notification_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'template', 'groupable', 'source_type', 'target_type', 'org_admin_only', 'send_email', 'email_subject', 'send_push_notification', 'icon', 'org_login_required', 'created', 'modified', 'active'];

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
    protected $casts = ['groupable' => 'boolean', 'org_admin_only' => 'boolean', 'send_email' => 'boolean', 'send_push_notification' => 'boolean', 'org_login_required' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
