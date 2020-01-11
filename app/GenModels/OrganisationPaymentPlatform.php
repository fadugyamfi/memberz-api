<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationPaymentPlatform extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_payment_platforms';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'payment_platform_id', 'currency_id', 'country_id', 'config', 'platform_mode', 'member_registration_instruction', 'event_registration_instruction', 'general_instructions', 'system_generated', 'created', 'modified', 'deleted'];

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
    protected $casts = ['system_generated' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
