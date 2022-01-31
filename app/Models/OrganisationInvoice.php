<?php

namespace App\Models;

use App\Traits\SoftDeletesWithDeletedFlag;
use Illuminate\Database\Eloquent\Model;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationInvoice extends Model implements ApiModelInterface
{

    use BelongsToTenants, SoftDeletesWithDeletedFlag, ApiModelBehavior;

    // override default soft delete column
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
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

    public function smsAccountTopup() {
        return $this->hasOne(SmsAccountTopup::class, 'organisation_invoice_id');
    }

    public function incrementTotal($amount) {
        $this->total_due += $amount;
        $this->save();
    }

    public function generateInvoiceNumber() {
        $this->invoice_no = $this->organisation_id . str_pad($this->id, 5, '0', STR_PAD_LEFT);
        $this->save();
    }

    public function hasInvoiceNumber() {
        return !empty($this->invoice_no);
    }
}
