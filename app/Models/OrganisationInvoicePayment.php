<?php

namespace App\Models;


use Torzer\Awesome\Landlord\BelongsToTenants;

class OrganisationInvoicePayment extends ApiModel  
{

    use BelongsToTenants;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_invoice_payments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_invoice_id', 'payment_type_id', 'amount', 'notes', 'payment_date', 'payee_name', 'member_account_id', 'transaction_id', 'created', 'modified', 'deleted'];

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

    public function organisation_invoice() {
        return $this->belongsTo(OrganisationInvoice::class);
    }
}
