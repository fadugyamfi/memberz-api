<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationAnniversary extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_anniversaries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'organisation_member_anniversary_count', 'show_on_reg_forms', 'send_anniversary_message', 'message', 'notify_on_anniversary', 'created', 'modified', 'active'];

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
    protected $casts = ['show_on_reg_forms' => 'boolean', 'send_anniversary_message' => 'boolean', 'notify_on_anniversary' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
