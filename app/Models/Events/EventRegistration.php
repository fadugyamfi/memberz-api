<?php

namespace App\Models\Events;

use App\Models\ApiModel;
use App\Models\Member;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithDeletedFlag;

class EventRegistration extends ApiModel
{

    use HasCakephpTimestamps, LogModelActivity, SoftDeletesWithDeletedFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_event_registrations';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_event_id', 'member_id', 'paid', 'fee_amount_paid', 'created', 'modified', 'deleted'];

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
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function event() {
        return $this->belongsTo(Event::class, 'organisation_event_id');
    }
}
