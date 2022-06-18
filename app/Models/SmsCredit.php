<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;

class SmsCredit extends ApiModel
{

    use SoftDeletesWithActiveFlag, HasCakephpTimestamps;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_credits';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['credit_amount', 'cost', 'unit_price', 'currency_id', 'created', 'modified', 'active'];

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
    protected $casts = ['active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
