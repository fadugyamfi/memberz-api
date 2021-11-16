<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use Illuminate\Database\Eloquent\Builder;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Contribution extends ApiModel
{
    use BelongsToTenants, SoftDeletesWithActiveFlag, LogsActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_member_contributions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'module_contribution_type_id', 'module_contribution_receipt_id', 'description', 'week', 'month', 'year', 'module_contribution_payment_type_id', 'cheque_status', 'cheque_number', 'bank_id', 'amount', 'currency_id', 'organisation_file_import_id', 'created', 'modified', 'active'];

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

    public function organisationMember(){
        return $this->belongsTo(OrganisationMember::class);
    }

    public function contributionType(){
        return $this->belongsTo(ContributionType::class, 'module_contribution_type_id');
    }

    public function organisationFileImport(){
        return $this->belongsTo(OrganisationFileImport::class);
    }

    public function contributionReceipt(){
        return $this->belongsTo(ContributionReceipt::class, 'module_contribution_receipt_id');
    }

    public function bank(){
        return $this->belongsTo(Bank::class);
    }

    public function contributionPaymentType(){
        return $this->belongsTo(ContributionPaymentType::class, 'module_contribution_payment_type_id');
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public static function getLatestYears() : Builder {
        return self::select('year')->distinct()->latest('year');
    }

    public function scopeGetSummaryData(Builder $query , string $receipt_dt, Contribution $contribution) : Builder {
        $receipt_ids = ContributionReceipt::whereDate('receipt_dt', $receipt_dt)->pluck('id');

        return $query->active()->where([
            ['organisation_id', '=', $contribution->organisation_id],
            ['module_contribution_type_id', '=', $contribution->module_contribution_type_id],
            ['currency_id', '=',  $contribution->currency_id],
        ])->whereIn('module_contribution_receipt_id', $receipt_ids);
    }

    public function scopeByYear(Builder $query, $year) : Builder {
        return $query->where('year', $year);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $contribution = $this;
        $type = $this->contributionType;
        $receipt = $this->contributionReceipt;

        return LogOptions::defaults()
            ->useLogName('finance')
            ->logAll()
            ->setDescriptionForEvent(function($eventName) use($contribution, $type, $receipt) {
                $params = [
                    'type_name' => $type->name,
                    'amount' => $contribution->currency->currency_code . ' ' . number_format($contribution->amount, 2),
                    'receipt_no' => $receipt->receipt_no
                ];

                if( $eventName == 'created' ) {
                    return __("Recorded ':type_name' contribution of :amount with receipt #:receipt_no", $params);
                }

                if( $eventName == 'updated' ) {
                    return __("Updated ':type_name' contribution of :amount with receipt #:receipt_no", $params);
                }

                if( $eventName == 'deleted' ) {
                    return __("Deleted ':type_name' contribution of :amount with receipt #:receipt_no", $params);
                }
            });
    }
}
