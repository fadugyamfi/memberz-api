<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use NunoMazer\Samehouse\BelongsToTenants;

class SmsAccount extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag;

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


    public static function getAccount($organisation_id) {
        return self::where('organisation_id', $organisation_id)->first();
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
}
