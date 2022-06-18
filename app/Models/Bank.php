<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use App\Traits\SoftDeletesWithDeletedFlag;

class Bank extends ApiModel
{

    use SoftDeletesWithDeletedFlag, HasCakephpTimestamps;

    const DELETED_AT = 'deleted';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banks';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'name', 'short_code', 'swift_code', 'address', 'phone_numbers', 'email', 'created', 'modifid', 'deleted'];

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
    protected $dates = ['created', 'modifid'];


    public function country() {
        return $this->belongsTo(Country::class);
    }
}
