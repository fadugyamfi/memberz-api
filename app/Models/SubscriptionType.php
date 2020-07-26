<?php

namespace App\Models;



class SubscriptionType extends ApiModel
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscription_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'description', 'capacity', 'validity', 'currency_id', 'initial_price', 'renewal_price', 'billing_required', 'initial_sms_credit', 'monthly_sms_bonus', 'accounts', 'reporting', 'revenue_tracking', 'expenditure_tracking', 'events', 'featured', 'created', 'modified', 'promotional', 'active'];

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
    protected $casts = ['revenue_tracking' => 'boolean', 'expenditure_tracking' => 'boolean', 'events' => 'boolean', 'featured' => 'boolean', 'promotional' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisationSubscription() {
        return $this->hasMany(OrganisationSubscription::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

}
