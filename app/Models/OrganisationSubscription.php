<?php

namespace App\Models;

use DateInterval;
use DateTime;
use Exception;
use Torzer\Awesome\Landlord\BelongsToTenants;

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
    

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function subscription_type() {
        return $this->belongsTo(SubscriptionType::class);
    }

    public function organisation_invoice() {
        return $this->belongsTo(OrganisationInvoice::class);
    }

    /**
     * Returns the current subscription for the organisation
     */
    public static function getCurrentSubscription($organisationId) {
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
            $days = $diff->days === -99999 || $diff->days === false ? 0 : $diff->days;
            
            $newEndDate->add( new DateInterval("P{$days}D") );
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
}
