<?php

namespace App\Models;



class TransactionType extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transaction_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['group', 'name', 'member_can_cancel', 'created', 'modified', 'active'];

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
    protected $casts = ['member_can_cancel' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

    /**
     * Relationship to OrganisationInvoice
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organisation_invoice() {
        return $this->hasMany(OrganisationInvoice::class);
    }
}