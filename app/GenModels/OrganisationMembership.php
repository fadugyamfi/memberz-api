<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationMembership extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_memberships';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'organisation_member_category_id', 'organisation_member_invoice_id', 'price', 'discount_offered', 'total_due', 'membership_start_dt', 'membership_end_dt', 'current', 'paid', 'created', 'modified', 'deleted'];

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
    protected $casts = ['current' => 'boolean', 'paid' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['membership_start_dt', 'membership_end_dt', 'created', 'modified'];

}
