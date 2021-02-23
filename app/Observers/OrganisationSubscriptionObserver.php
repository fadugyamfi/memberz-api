<?php

namespace App\Observers;

use App\Models\SubscriptionType;
use App\Models\OrganisationSubscription;
use Carbon\Carbon;
use Exception;

class OrganisationSubscriptionObserver
{

    /**
     * Handle the organisation subscription "creating" event.
     *
     * @param  \App\OrganisationSubscription  $organisationSubscription
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
     * @param  \App\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function created(OrganisationSubscription $organisationSubscription)
    {
        OrganisationSubscription::where([
            'organisation_id' => $organisationSubscription->organisation_id,
            'current' => 1
        ])->update([
            'current' => 0
        ]);

        $organisationSubscription->current = 1;
        $organisationSubscription->save();
    }

    /**
     * Handle the organisation subscription "updated" event.
     *
     * @param  \App\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function updated(OrganisationSubscription $organisationSubscription)
    {
        //
    }

    /**
     * Handle the organisation subscription "deleted" event.
     *
     * @param  \App\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function deleted(OrganisationSubscription $organisationSubscription)
    {
        //
    }

    /**
     * Handle the organisation subscription "restored" event.
     *
     * @param  \App\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function restored(OrganisationSubscription $organisationSubscription)
    {
        //
    }

    /**
     * Handle the organisation subscription "force deleted" event.
     *
     * @param  \App\OrganisationSubscription  $organisationSubscription
     * @return void
     */
    public function forceDeleted(OrganisationSubscription $organisationSubscription)
    {
        //
    }
}
