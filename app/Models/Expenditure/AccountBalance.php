<?php

namespace App\Models\Expenditure;

use Spatie\Activitylog\LogOptions;
use NunoMazer\Samehouse\BelongsToTenants;
use App\Models\{ApiModel, MemberAccount, Organisation};
use App\Traits\{HasCakephpTimestamps, LogModelActivity, SoftDeletesWithDeletedFlag};

class AccountBalance extends ApiModel
{
    use BelongsToTenants;
    use LogModelActivity;
    use HasCakephpTimestamps;
    use SoftDeletesWithDeletedFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_account_balances';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'module_contribution_account_id', 'balance', 'balance_dt', 'member_account_id', 'created', 'modified', 'deleted'];

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
    protected $dates = ['balance_dt', 'created', 'modified'];

    public function oranisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function contributionAccount()
    {
        return $this->belongsTo(contributionAccount::class);
    }

    public function memberAccount()
    {
        return $this->belongsTo(MemberAccount::class);
    }


    public function getActivitylogOptions(): LogOptions
    {
        $accountBalance = $this;
        $memberAccount = $this->memberAccount;

        return LogOptions::defaults()
            ->useLogName('expenditure')
            ->logAll()
            ->setDescriptionForEvent(function ($eventName) use ($accountBalance, $memberAccount) {
                $params = [
                    'username' => $memberAccount->username,
                    'balance' => $accountBalance->balance
                ];

                if ($eventName == 'created') {
                    return __("Created account balance of balance ':balance' for member account ':username'", $params);
                }

                if ($eventName == 'updated') {
                    return __("Updated account balance of balance ':balance' for member account ':username'", $params);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted account balance of balance ':balance' for member account ':username'", $params);
                }
            });
    }
}
