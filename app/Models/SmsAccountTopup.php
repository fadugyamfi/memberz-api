<?php

namespace App\Models;

use App\Scopes\LatestRecordsScope;
use App\Traits\SoftDeletesWithDeletedFlag;
use App\Scopes\SmsAccountScope;
use App\Traits\LogModelActivity;

class SmsAccountTopup extends ApiModel
{

    use SoftDeletesWithDeletedFlag, LogModelActivity;

    const DELETED_AT = 'deleted';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_account_topups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['module_sms_account_id', 'organisation_invoice_id', 'module_sms_credit_id', 'credit_amount', 'credited', 'is_bonus', 'created', 'modified', 'deleted'];

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
    protected $casts = ['credited' => 'boolean', 'is_bonus' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SmsAccountScope);
        static::addGlobalScope(new LatestRecordsScope);
    }


    public function organisationInvoice() {
        return $this->belongsTo(OrganisationInvoice::class);
    }

    public function smsCredit() {
        return $this->belongsTo(SmsCredit::class);
    }
}
