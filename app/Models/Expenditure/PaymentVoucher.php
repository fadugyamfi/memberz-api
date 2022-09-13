<?php

namespace App\Models\Expenditure;

use Spatie\Activitylog\LogOptions;
use App\Models\{ApiModel, Organisation};
use NunoMazer\Samehouse\BelongsToTenants;
use App\Traits\{HasCakephpTimestamps, LogModelActivity, SoftDeletesWithDeletedFlag};

class PaymentVoucher extends ApiModel
{
    use BelongsToTenants;
    use HasCakephpTimestamps;
    use SoftDeletesWithDeletedFlag;
    use LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_payment_vouchers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'voucher_no', 'payment_dt', 'created', 'modified', 'deleted'];

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
    protected $dates = ['payment_dt', 'created', 'modified'];


    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $paymentVoucher = $this;

        return LogOptions::defaults()
            ->useLogName('expenditure')
            ->logAll()
            ->setDescriptionForEvent(function ($eventName) use ($paymentVoucher) {
                $params = [
                    'voucher_no' => $paymentVoucher->voucher_no
                ];

                if ($eventName == 'created') {
                    return __("Created payment voucher record with voucher number ':voucher_no'", $params);
                }

                if ($eventName == 'updated') {
                    return __("Updated payment voucher record with voucher number ':voucher_no'", $params);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted payment voucher record with voucher number ':voucher_no'", $params);
                }
            });
    }
}
