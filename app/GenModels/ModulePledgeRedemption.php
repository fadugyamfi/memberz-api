<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class ModulePledgeRedemption extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_pledge_redemptions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'module_pledge_id', 'organisation_member_id', 'amount', 'receipt_no', 'receipt_dt', 'created', 'modified'];

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
    protected $dates = ['receipt_dt', 'created', 'modified'];

}
