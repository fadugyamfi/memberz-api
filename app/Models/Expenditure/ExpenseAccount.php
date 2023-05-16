<?php

namespace App\Models\Expenditure;

use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;
use App\Models\{ApiModel, Bank, Country, Currency, Organisation};
use App\Traits\{HasCakephpTimestamps, LogModelActivity, SoftDeletesWithDeletedFlag};

class ExpenseAccount extends ApiModel
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
    protected $table = 'module_contribution_accounts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'account_type', 'bank_id', 'amount', 'currency_id', 'created', 'modified', 'deleted'];

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
    protected $dates = ['created', 'modified'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $account = $this;
        $currency = $this->currency;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("expenditure")
            ->setDescriptionForEvent(function ($eventName) use ($account, $currency) {
                if ($eventName == 'created') {
                    return __('Added ":currency" account with name ":name"', [
                        'name' => $account?->name,
                        'currency' => $currency?->name
                    ]);
                }

                if ($eventName == 'updated') {
                    return __('Updated ":currency" account with name ":name"', [
                        'name' => $account?->name,
                        'currency' => $currency?->name
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __('Deleted ":currency" account with name ":name"', [
                        'name' => $account->name,
                        'currency' => $currency?->name
                    ]);
                }
            });
    }
}
