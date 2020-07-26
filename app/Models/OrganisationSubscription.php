<?php

namespace App\Models;

use DateInterval;
use DateTime;
use Exception;
use Torzer\Awesome\Landlord\BelongsToTenants;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class OrganisationSubscription extends ApiModel
{

    use BelongsToTenants;

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
        return $this->belongsTo(SubscriptionType::class);
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
     * Creates a new subscription for an organisation with the specified paramaters
     */
    public static function createNewSubscription($organisationId, $subscriptionTypeId, $length, $organisationInvoiceId = null) {

        $currentSubscription = self::getCurrentSubscription($organisationId);

        $newStartDate = new DateTime();
        $newEndDate = new DateTime();
        $newEndDate->add( new DateInterval("P{$length}M") );

        $currentSubEndDate = $currentSubscription ? new DateTime( $currentSubscription->end_dt ) : new DateTime();
        $now = new DateTime();

        // if current subscription date has not elapsed
        if( $now < $currentSubEndDate ) {
            $diff = $now->diff($currentSubEndDate);
            $diffNewDays = $now->diff($newEndDate);
            $days = $diff->days === -99999 || $diff->days === false ? 0 : $diff->days;
            $newDays = $diffNewDays === -99999 || $diffNewDays->days === false ? 0 : $diffNewDays->days;

            Log::debug("Remaining Sub Days: {$days}, New Sub Days: {$newDays}");

            if( abs($newDays - $days) > OrganisationSubscription::MIN_ALLOWED_PRORATE_DAYS ) {
                $newEndDate->add( new DateInterval("P{$days}D") );
            }
        }

        // create new subscription record
        return self::create([
            'organisation_id' => $organisationId,
            'organisation_invoice_id' => $organisationInvoiceId,
            'subscription_type_id' => $subscriptionTypeId,
            'start_dt' => $newStartDate->format('Y-m-d H:i:s'),
            'end_dt' => $newEndDate->format('Y-m-d H:i:s'),
            'length' => $length,
            'current' => 0
        ]);
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

        $invoice = $this->organisation_invoice;
        $sub_end_dt = $this->end_dt;
        $sub_start_dt = $this->start_dt;
        $now = new Carbon();
        $diff = $now->diff($sub_end_dt);

        if( $this->subscription_type->billing_required == 'yes' ) {
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

        return $this->subscription_type->billing_required == 'yes' && $this->remaining_balance > OrganisationSubscription::MIN_ALLOWED_PRORATE_DAYS;
    }
}
