<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationMemberInvoicePayment extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_invoice_payments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_member_invoice_id', 'organisation_payment_platform_id', 'amount', 'notes', 'payment_date', 'payee_name', 'member_account_id', 'transaction_id', 'created', 'modified', 'deleted'];

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
    protected $casts = ['deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['payment_date', 'created', 'modified'];

}
