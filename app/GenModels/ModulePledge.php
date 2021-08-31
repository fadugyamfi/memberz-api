<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class ModulePledge extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_pledges';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'module_pledge_type_id', 'organisation_member_id', 'amount_pledged', 'amount_redeemed', 'pledge_dt', 'redeemed', 'created', 'modified', 'active'];

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
    protected $casts = ['redeemed' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['pledge_dt', 'created', 'modified'];

}
