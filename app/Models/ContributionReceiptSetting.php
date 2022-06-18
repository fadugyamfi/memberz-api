<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use Illuminate\Database\Eloquent\Builder;
use NunoMazer\Samehouse\BelongsToTenants;

class ContributionReceiptSetting extends ApiModel
{

    use BelongsToTenants, HasCakephpTimestamps;


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

    protected $appends = ['default_currency_code'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function defaultCurrency(){
        return $this->belongsTo(Currency::class, 'default_currency');
    }

    public function currency() {
        return $this->belongsTo(Currency::class, 'default_currency');
    }

    public function scopeOrganisationReceipt(Builder $query, int $organisation_id) {
        return $query->where('organisation_id', $organisation_id);
    }

    public function getDefaultCurrencyCodeAttribute() {
        return $this->currency?->currency_code;
    }

    public function nextReceiptNo() {
        return $this->receipt_prefix . $this->receipt_counter . $this->receipt_suffix;
    }

    public function incrementCounter() {
        return $this->increment('receipt_counter');
    }

    /**
     * @param \App\Models\Organisation $organisation
     *
     * @return \App\Models\ContributionReceiptSetting
     */
    public static function setup(Organisation $organisation): ContributionReceiptSetting {
        return self::firstOrCreate([
            'organisation_id' => $organisation->id
        ],[
            'receipt_mode' => 'manual',
            'receipt_counter' => 1,
            'default_currency' => $organisation->currency_id,
            'receipt_prefix' => null,
            'receipt_postfix' => null,
        ]);
    }
}
