<?php

namespace App\Models\Expenditure;

use Spatie\Activitylog\LogOptions;
use NunoMazer\Samehouse\BelongsToTenants;
use App\Traits\{HasCakephpTimestamps, LogModelActivity, SoftDeletesWithActiveFlag};
use App\Models\{ApiModel, Currency, Organisation, OrganisationFileImport, OrganisationMember};

class Expense extends ApiModel
{
    use BelongsToTenants;
    use LogModelActivity;
    use HasCakephpTimestamps;
    use SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_expenses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'expense_type_id', 'payment_voucher_id', 'organisation_member_id', 'description', 'account_id', 'cheque_number', 'amount', 'currency_id', 'organisation_file_import_id', 'created', 'modified', 'active'];

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


    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function expenseType(){
        return $this->belongsTo(ExpenseType::class);
    }

    public function paymentVoucher(){
        return $this->belongsTo(PaymentVoucher::class);
    }

    public function organisationMember(){
        return $this->belongsTo(OrganisationMember::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function organisationFileImport(){
        return $this->belongsTo(OrganisationFileImport::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $expense = $this;
        $expenseType = $this->expenseType;

        return LogOptions::defaults()
            ->useLogName('expenditure')
            ->logAll()
            ->setDescriptionForEvent(function ($eventName) use ($expense, $expenseType) {
                $params = [
                    'amount' => $expense->amount,
                    'type' => $expenseType->name
                ];

                if ($eventName == 'created') {
                    return __("Created ':type' expense with the amount ':amount'", $params);
                }

                if ($eventName == 'updated') {
                    return __("Updated ':type' expense with the amount ':amount'", $params);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted ':type' expense with the amount ':amount'", $params);
                }
            });
    }
}
