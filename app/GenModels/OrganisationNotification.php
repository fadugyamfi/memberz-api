<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationNotification extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_notifications';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'notification_type_id', 'source_id', 'target_id', 'read', 'created', 'modified', 'active'];

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
    protected $casts = ['read' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
