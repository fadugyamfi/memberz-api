<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisationGroupLeader extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_group_leaders';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_group_id', 'organisation_member_id', 'role', 'created', 'modified', 'active'];

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
    protected $casts = ['active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
