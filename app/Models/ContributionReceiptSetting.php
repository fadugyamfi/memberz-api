<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class ContributionReceiptSetting extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_receipt_settings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'receipt_mode', 'receipt_prefix', 'receipt_postfix', 'receipt_counter', 'default_currency', 'sms_notify', 'created', 'modified'];

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
    protected $casts = ['sms_notify' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function scopeOrganisationReceipt(Builder $query, int $organisation_id) {
        return $query->where('organisation_id', $organisation_id);
    }

}
