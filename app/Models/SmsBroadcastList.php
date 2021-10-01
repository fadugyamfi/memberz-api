<?php

namespace App\Models;

use App\Scopes\LatestRecordsScope;
use App\Scopes\SmsAccountScope;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use Spatie\Activitylog\LogOptions;

class SmsBroadcastList extends ApiModel
{

    use SoftDeletesWithActiveFlag, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_broadcast_lists';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['module_sms_account_id', 'name', 'type', 'sender_id', 'size', 'created', 'modified', 'active'];

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

    public function smsAccount() {
        return $this->belongsTo(SmsAccount::class);
    }

    public function smsBroadcast() {
        return $this->hasMany(SmsBroadcast::class);
    }


    /**
     * Format user activities description for Sms Broadcast List
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $smsBdcastList = $this;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("sms")
            ->setDescriptionForEvent(function (string $eventName) use ($smsBdcastList) {
                if ($eventName == 'created') {
                    return __("Created broadcast list \":name\" with sender id \":sender\"", [
                        "name" => $smsBdcastList->name,
                        "type" => $smsBdcastList->type,
                        'size' => $smsBdcastList->size,
                        'sender' => $smsBdcastList->sender_id,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated broadcast list \":name\" with sender id \":sender\"", [
                        "name" => $smsBdcastList->name,
                        "type" => $smsBdcastList->type,
                        'size' => $smsBdcastList->size,
                        'sender' => $smsBdcastList->sender_id
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted broadcast list \":name\" with sender id \":sender\"", [
                        "name" => $smsBdcastList->name,
                        "type" => $smsBdcastList->type,
                        'size' => $smsBdcastList->size,
                        'sender' => $smsBdcastList->sender_id
                    ]);
                }
            });
    }
}
