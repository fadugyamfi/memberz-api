<?php

namespace App\Models;

use App\Scopes\LatestRecordsScope;
use App\Scopes\SmsAccountScope;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use App\Traits\PersonalizesSmsMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\PhoneNumber;

class SmsAccountMessage extends ApiModel
{

    use SoftDeletesWithActiveFlag, HasCakephpTimestamps, PersonalizesSmsMessage;

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
    protected $casts = [
        'bday_msg' => 'boolean', 
        'active' => 'boolean',
        'sent_at' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['sent_at', 'created', 'modified'];

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

    public function scopeSent($query) {
        return $query->where('sent', 1);
    }

    public function scopeUnsent($query) {
        return $query->where('sent', 0);
    }

    public function scopeLatestYears($query) {
        return $query->select(DB::raw('YEAR(created) as year'))->distinct()->orderBy('year', 'desc');
    }

    public static function createNew(MemberAccount $user, OrganisationMember $membership, string $message) {

        $smsAccount = SmsAccount::getAccount($membership->organisation_id);

        if( !$smsAccount ) {
            throw new Exception('SMS Account not setup');
        }

        if( !$user->tenantAccount ) {
            throw new Exception('User admin account for organisation not found');
        }

        if( !$membership->member->mobile_number ) {
            throw new Exception('Membership does not have a mobile number to message');
        }

        // Number is valid for countries we can message
        $validator = Validator::make(
            ['phone_number' => $membership->member->mobile_number],
            ['phone_number' => Rule::phone()->country(['AUTO', 'GH', 'US', 'NG', 'BN', 'UK'])]
        );

        if( $validator->fails() ) {
            throw new Exception('Invalid mobile number to message: ' . $membership->member->mobile_number);
        }

        return self::create([
            'module_sms_account_id' => $smsAccount->id,
            'organisation_id' => $smsAccount->organisation_id,
            'member_id' => $membership->member_id,
            'to' => $membership->member->mobile_number,
            'message' => (new static)->personalize($membership, $smsAccount, $message),
            'sent_by' => $user->tenantAccount->id,
            'sender_id' => $smsAccount->sender_id
        ]);
    }
}
