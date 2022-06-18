<?php

namespace App\Models\Support;

use App\Traits\SoftDeletesWithDeletedFlag;
use App\Traits\HasCakephpTimestamps;

class SmsLog extends SupportModel
{

    use SoftDeletesWithDeletedFlag;

    const DELETED_AT = 'deleted';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sms_logs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sender_id', 'to', 'message', 'message_id', 'status_code', 'deleted'];

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
    protected $dates = [];


    public static function logMsg($sender_id, $to, $message, $message_id, $status_code) {

        $to = !is_array($to) ? [$to] : $to;

        foreach($to as $number) {
            self::create(array(
                'sender_id' => $sender_id,
                'to' => $number,
                'message' => $message,
                'message_id' => $message_id,
                'status_code' => $status_code
            ));
        }
    }
}
