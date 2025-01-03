<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use App\Traits\SoftDeletesWithDeletedFlag;

class PaymentPlatform extends ApiModel
{

    use HasCakephpTimestamps, SoftDeletesWithDeletedFlag;

    const CASH = 3;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_platforms';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'method_name', 'config_keys', 'logo', 'instructions', 'created', 'modified', 'deleted'];

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

}
