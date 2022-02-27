<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use App\Traits\SoftDeletesWithDeletedFlag;
use LaravelApiBase\Models\ApiModel;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationPaymentPlatform extends ApiModel
{

    use HasCakephpTimestamps, BelongsToTenants, SoftDeletesWithDeletedFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_payment_platforms';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'payment_platform_id', 'currency_id', 'country_id', 'config', 'platform_mode', 'member_registration_instruction', 'event_registration_instruction', 'general_instructions', 'system_generated', 'created', 'modified', 'deleted'];

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
    protected $casts = ['system_generated' => 'boolean', 'deleted' => 'boolean', 'config' => 'array'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    /**
     * Relationships
     */
    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function paymentPlatform() {
        return $this->belongsTo(PaymentPlatform::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public static function createSystemGeneratedCashPaymentPlatform(Organisation $organisation) {
        return OrganisationPaymentPlatform::firstOrCreate([
            'organisation_id' => $organisation->id,
            'system_generated' => 1,
            'payment_platform_id' => PaymentPlatform::CASH
        ],[
            'country_id' => $organisation->country_id,
            'currency_id' => $organisation->currency_id,
            'platform_mode' => 'live'
        ]);
    }
}
