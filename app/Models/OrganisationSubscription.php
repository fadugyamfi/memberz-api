<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use NunoMazer\Samehouse\BelongsToTenants;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;

class OrganisationSubscription extends Model implements ApiModelInterface
{

    use BelongsToTenants, ApiModelBehavior, HasCakephpTimestamps;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_subscriptions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'subscription_type_id', 'organisation_invoice_id', 'start_dt', 'end_dt', 'length', 'current', 'last_renewal_notice_dt', 'created', 'modified'];

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
    protected $casts = ['current' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_dt', 'end_dt', 'last_renewal_notice_dt', 'created', 'modified'];

    public $remaining_days = 0;
    public $remaining_balance = 0;
    public $remaining_months = 0;
    public $per_day_cost = 0;
    public $remaining_days_cost = 0;

    const MIN_ALLOWED_PRORATE_DAYS = 7;


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function subscriptionType() {
        return $this->belongsTo(SubscriptionType::class)->withTrashed();
    }

    public function organisationInvoice() {
        return $this->belongsTo(OrganisationInvoice::class);
    }

    /**
     * Returns the current subscription for the organisation
     */
    public static function getCurrentSubscription($organisationId): OrganisationSubscription {
        return self::where(['organisation_id' => $organisationId, 'current' => 1])->first();
    }

    /**
     * Calculates the remaining account balance in order to provide a
     * prorated discount when customers attempt a subscription upgrade
     */
    private function calculateRemainingBalance() {
        if( $this->remaining_balance != 0 ) {
            return;
        }

        $total_days = 0;
        $days_remaining = 0;
        $remaining_months = 0;
        $per_day_cost = 0;
        $remaining_days_cost = 0;
        $total_c_plan_cost = 0;

        $invoice = $this->organisationInvoice;
        $sub_end_dt = $this->end_dt;
        $sub_start_dt = $this->start_dt;
        $now = new Carbon();
        $diff = $now->diff($sub_end_dt);

        if( $this->subscriptionType->billing_required == 'yes' ) {
            $days_remaining = $diff->days == 99999 || !$diff->days ? 0 : $diff->days;
            $total_diff = $sub_start_dt->diff($sub_end_dt);
            $total_days = $total_diff->days == 99999 || !$total_diff->days ? 0 : $total_diff->days;

            $total_c_plan_cost = doubleval($invoice->total_due);
            $per_day_cost = $total_c_plan_cost / $total_days;
            $remaining_days_cost = $days_remaining * $per_day_cost;
            $remaining_months = $diff->m;
        }

        $this->per_day_cost = $per_day_cost;
        $this->remaining_days = $days_remaining;
        $this->remaining_balance = $remaining_days_cost;
        $this->remaining_months = $remaining_months;
    }

    public function hasProrateDiscount() {
        $this->calculateRemainingBalance();

        return $this->subscriptionType->billing_required == 'yes'
            && $this->remaining_balance > OrganisationSubscription::MIN_ALLOWED_PRORATE_DAYS;
    }

    public function setAsCurrent() {
        $this->newQuery()->where([
            'organisation_id' => $this->organisation_id,
            'current' => 1
        ])->update([
            'current' => 0
        ]);

        $this->current = 1;
        $this->save();
    }

    public function isExpired(): bool {
        return $this->end_dt->isBefore(now());
    }
}
