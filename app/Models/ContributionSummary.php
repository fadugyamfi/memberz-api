<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithDeletedFlag;
use Illuminate\Database\Eloquent\Builder;
use NunoMazer\Samehouse\BelongsToTenants;
use NunoMazer\Samehouse\Facades\Landlord;

class ContributionSummary extends ApiModel
{
    use BelongsToTenants, LogModelActivity, SoftDeletesWithDeletedFlag;

    const DELETED_AT = 'deleted';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_summaries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'receipt_dt', 'module_contribution_type_id', 'week', 'month', 'year', 'currency_id', 'amount', 'created', 'modified', 'deleted'];

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
    protected $dates = ['receipt_dt', 'created', 'modified'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function contributionType()
    {
        return $this->belongsTo(ContributionType::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeGetByOrganisation(Builder $query, int $org_id) : Builder {
        return $query->where('organisation_id', $org_id);
    }

    public function scopeGetByContributionTypeId(Builder $query, int $contribution_type_id) : Builder {
        return $query->where('module_contribution_type_id', $contribution_type_id);
    }

    public function scopeGetByYear(Builder $query, int $year) : Builder {
       return $query->where('year', $year);
    }

    public function scopeGetByMonth(Builder $query, int $month) : Builder {
        return $query->where('month', $month);
    }

    public function scopeGetByWeek(Builder $query, int $week) : Builder {
        return $query->where('week', $week);
    }

    public function scopeGetByCurrencyId(Builder $query, int $currency_id) : Builder {
        return $query->where('currency_id', $currency_id);
    }

    public function scopeGetByReceiptDt(Builder $query, string $receipt_dt) : Builder {
        return $query->where('receipt_dt', $receipt_dt);
    }

    public function scopeGetExistingSummaryRecord(Builder $builder, string $receipt_dt,  Contribution $contribution) : Builder
    {
        $week = $this->getWeeks($receipt_dt, 'Monday');
        $year = date('Y', strtotime($receipt_dt));
        $month = date('m', strtotime($receipt_dt));

        return $builder
                ->getByOrganisation($contribution->organisation_id)
                ->getContributionTypeId($contribution->module_contribution_type_id)
                ->getByReceiptDt($receipt_dt)
                ->getByWeek($week)
                ->getByYear($year)
                ->getByMonth($month)
                ->getByCurrencyId($contribution->currency_id);
    }

    public function scopeGetReportByYear(Builder $query, int $year, int $contribution_type_id) : Builder {
        return $query->getByOrganisationId(Landlord::getTenants()->first())->getByYear($year)->getByContributionTypeId($contribution_type_id);
    }

    public function scopeGetReportByMonthYear(Builder $query, int $month, int $year, int $contribution_type_id) : Builder {
       return $query->getReportByYear($year, $contribution_type_id)->getByMonth($month);
    }

    public function createSummary(string $receipt_dt, $amount = 0.0, Contribution $contribution = null) : void {
        $week = $this->getWeeks($receipt_dt, 'Monday');
        $year = date('Y', strtotime($receipt_dt));
        $month = date('m', strtotime($receipt_dt));

        self::create([
            'organisation_id' => $contribution->organisation_id,
            'receipt_dt' => $contribution->receipt_dt,
            'module_contribution_type_id' => $contribution->module_contribution_type_id, 
            'week' => $week, 
            'month' => $month, 
            'year' => $year, 
            'currency_id' => $contribution->currency_id, 
            'amount' => $amount,
        ]);
    }

    /**
     * Returns the amount of weeks into the month a date is
     * @param $date a YYYY-MM-DD formatted date
     * @param $rollover The day on which the week rolls over
     */
    private function getWeeks(string $date, string $rollover): int
    {
        $cut = substr($date, 0, 8);
        $daylen = 86400;

        $timestamp = strtotime($date);
        $first = strtotime($cut . "00");
        $elapsed = ($timestamp - $first) / $daylen;

        $weeks = 1;

        for ($i = 1; $i <= $elapsed; $i++) {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);

            $day = strtolower(date("l", $daytimestamp));

            if ($day == strtolower($rollover)) {$weeks++;}
        }

        return $weeks;
    }

}
