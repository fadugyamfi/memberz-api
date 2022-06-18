<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use App\Traits\SoftDeletesWithActiveFlag;
use Illuminate\Database\Eloquent\Builder;

class NotificationParam extends ApiModel
{

    use HasCakephpTimestamps, SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member_account_notification_params';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['notification_id', 'key', 'value', 'created', 'modified', 'active'];

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


    public function scopeActive(Builder $query) {
        $query->where('active', 1);
    }

    public function notification(){
        return $this->belongsTo(Notification::class);
    }

}
