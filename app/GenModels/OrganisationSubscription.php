<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationSubscription extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_subscriptions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'subscription_type_id', 'organisation_invoice_id', 'start_dt', 'end_dt', 'length', 'current', 'last_renewal_notice_dt', 'created', 'modified'];

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
    protected $casts = ['current' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_dt', 'end_dt', 'last_renewal_notice_dt', 'created', 'modified'];

}
