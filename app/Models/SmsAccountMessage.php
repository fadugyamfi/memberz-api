<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use Illuminate\Http\Request;

class SmsAccountMessage extends ApiModel
{

    use SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_account_instant_messages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['module_sms_account_id', 'member_id', 'to', 'message', 'bday_msg', 'sender_id', 'module_sms_account_broadcast_id', 'sent_at', 'sent', 'sent_by', 'sent_status', 'created', 'modified', 'active'];

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
    protected $casts = ['bday_msg' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['sent_at', 'created', 'modified'];


    public function smsAccount() {
        return $this->belongsTo(SmsAccount::class, 'module_sms_account_id');
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function sender() {
        return $this->belongsTo(OrganisationAccount::class, 'sent_by');
    }

    public function broadcast() {
        return $this->belongsTo(SmsBroadcast::class, 'module_sms_account_broadcast_id');
    }

    public function updateSentStatus(string $status, int $sentFlag) {
        $this->sent_status = $status;
        $this->sent = $sentFlag;
        $this->sent_at = date('Y-m-d H:i:s');
        $this->save();
    }

    public function getPagesAttribute() {
        return ceil(strlen($this->message) / 160);
    }

    public function buildSearchParams(Request $request, $builder)
    {
        $builder = parent::buildSearchParams($request, $builder);

        if( $request->sent_flag != null ) {
            switch($request->sent_flag) {
                case 1:
                    $builder->where('sent', 1);
                    break;
                case -1:
                    $builder->where('sent', 0)->where('sent_status', 'LIKE', '%Failed%');
                    break;
                case 0:
                    $builder->where('sent', 0)->whereNull('sent_status');
                    break;
            }
        }


        return $builder;
    }
}
