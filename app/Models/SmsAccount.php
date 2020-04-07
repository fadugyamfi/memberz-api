<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsAccount extends ApiModel
{



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

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function($query) {
            $query->where('active', 1);
        });
    }

    public static function getAccount($organisation_id) {
        return self::where('organisation_id', $organisation_id)->first();
    }

    public static function deductCredit($organisation_id, $credit = 1) {
        $account = self::getAccount($organisation_id);

        if( !$account ) {
            return;
        }

        $credit_remaining = 0;
        $bonus = intval($account->bonus_balance);
        $credit_bal = intval($account->account_balance);

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

        $account->account_balance = $credit_bal;
        $account->bonus_balance = $bonus;
        $account->save();
    }

    public static function addCredit($organisation_id, $credit = 0, $is_bonus = 0) {
        $account = self::getAccount($organisation_id);

        if( !$account ) {
            return;
        }

        if( !$is_bonus ) {
            $account->account_balance += $credit;
        } else {
            $account->bonus_balance += $credit;
        }

        $account->save();
    }

    public function setBonus($organisation_id, $bonus_amount) {
        $account = $this->getAccount($organisation_id);

        if( $account ) {
            $account->bonus_balance = $bonus_amount;
            $account->save();
        }
    }
}
