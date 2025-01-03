<?php

namespace App\Observers;

use App\Models\SubscriptionType;
use App\Models\OrganisationSubscription;
use Exception;

class OrganisationSubscriptionObserver
{

    /**
     * Handle the organisation subscription "creating" event.
     *
     * @param  \App\Models\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function creating(OrganisationSubscription $organisationSubscription)
    {
        if( $organisationSubscription->end_dt ) {
            return;
        }

        $subscriptionType = SubscriptionType::find($organisationSubscription->subscription_type_id);

        if( !$subscriptionType ) {
            throw new Exception("Invalid Subscription Type Selected");
        }

        $organisationSubscription->end_dt = $subscriptionType->getValidityEndDate()->format('Y-m-d H:i:s');
    }

    /**
     * Handle the organisation subscription "created" event.
     *
     * @param  \App\Models\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function created(OrganisationSubscription $organisationSubscription)
    {
        $organisationSubscription->setAsCurrent();
    }

}
