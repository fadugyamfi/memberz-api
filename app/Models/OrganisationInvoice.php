<?php

namespace App\Models;

use App\Traits\SoftDeletesWithDeletedFlag;
use Torzer\Awesome\Landlord\BelongsToTenants;

class OrganisationInvoice extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithDeletedFlag;

    // override default soft delete column
    const DELETED_AT = 'deleted';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_invoices';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'transaction_type_id', 'member_account_id', 'invoice_no', 'paid', 'currency_id', 'total_due', 'due_date', 'notes', 'created', 'modified', 'deleted', 'deleted_by'];

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
    protected $casts = ['paid' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['due_date', 'created', 'modified'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function organisationInvoiceItems()
    {
        return $this->hasMany(OrganisationInvoiceItem::class);
    }

    public function organisationInvoicePayments()
    {
        return $this->hasMany(OrganisationInvoicePayment::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    

}
