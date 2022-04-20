<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use Illuminate\Database\Eloquent\Builder;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class SmsAccount extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_accounts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'sender_id', 'account_balance', 'bonus_balance', 'created', 'modified', 'active'];

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

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public static function getAccount($organisation_id) {
        return self::where('organisation_id', $organisation_id)->first();
    }

    public function scopeActiveAccount(Builder $builder, $organisation_id) : Builder {
        return $builder->where('organisation_id', $organisation_id)->where('active', 1);
    }

    public function getAvailableCreditAttribute() {
        return intval($this->account_balance) + intval($this->bonus_balance);
    }

    public function hasCredit() {
        return $this->available_credit > 0;
    }

    public function deductCredit($credit = 1) {

        $credit_remaining = 0;
        $bonus = intval($this->bonus_balance);
        $credit_bal = intval($this->account_balance);

        if( $bonus >= $credit ) {
            $bonus -= $credit;
        }

        if( $bonus < $credit && $bonus >= 0 ) {
            $credit_remaining = $credit - $bonus;
            $bonus = 0;
        }

        if( $credit_remaining > 0 && $credit_bal >= $credit_remaining ) {
            $credit_bal -= $credit_remaining;
        }

        $this->account_balance = $credit_bal;
        $this->bonus_balance = $bonus;
        $this->save();
    }

    public function addCredit($credit = 0, $is_bonus = 0) {

        if( !$is_bonus ) {
            $this->account_balance += $credit;
        } else {
            $this->bonus_balance += $credit;
        }

        $this->save();
    }

    public function setBonus($bonus_amount) {
        $this->bonus_balance = $bonus_amount;
        $this->save();
    }

    /**
     * Format user activities description for Sms Account
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $sender = $this->sender_id;
        $org = $this->organisation->name;
        $account_balance = $this->account_balance;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("sms")
            ->setDescriptionForEvent(function (string $eventName) use ($sender, $org, $account_balance) {
                if ($eventName == 'created') {
                    return __("Created sms account with sender id \":sender\" for \":org_name\"", [
                        "account_balance" => $account_balance,
                        "org_name" => $org,
                        'sender' => $sender,
                    ]);
                }

                /**
                 * Added an auth()->check() to prevent logging events when the SMS Account is updated
                 * via background jobs which send the SMS messages. They will continually update the account
                 * balance as messages are sent
                 */
                if ($eventName == 'updated') {
                    return __("Updated sms account with sender id of \":sender\" for \":org_name\". Account balance: \":account_balance\" ", [
                        "account_balance" => $account_balance,
                        "org_name" => $org,
                        'sender' => $sender,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted sms account for \":org_name\"", [
                        "account_balance" => $account_balance,
                        "org_name" => $org,
                        'sender' => $sender,
                    ]);
                }
            });
    }
}
