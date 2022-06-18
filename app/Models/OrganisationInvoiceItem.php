<?php

namespace App\Models;

use App\Traits\SoftDeletesWithDeletedFlag;
use App\Traits\HasCakephpTimestamps;
use Illuminate\Database\Eloquent\Model;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;

class OrganisationInvoiceItem extends Model implements ApiModelInterface
{

    use SoftDeletesWithDeletedFlag, HasCakephpTimestamps, ApiModelBehavior;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_invoice_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_invoice_id', 'qty', 'product_type', 'product_id', 'description', 'unit_price', 'tax_amount', 'gross_total', 'total', 'created', 'modified', 'deleted'];

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
    protected $dates = ['created', 'modified'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationInvoice()
    {
        return $this->belongsTo(OrganisationInvoice::class);
    }

    public function addTotalToInvoice() {
        $this->organisationInvoice->incrementTotal($this->total);
    }
}
