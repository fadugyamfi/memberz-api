<?php

namespace App\Services;

use App\Models\OrganisationInvoice;
use App\Models\OrganisationSubscription;
use Exception;

class SubscriptionManagementService {

    /**
     * Renews a subscription at a current tier
     */
    public function renew($orgSubscriptionId, $length) {
        $subscription = OrganisationSubscription::with(['organisation', 'organisationInvoice'])->find($orgSubscriptionId);

        if( !$subscription ) {
            throw new Exception("Subscription to renew not found");
        }

        if( $subscription->organisationInvoice->paid == 0 ) {
            throw new Exception("Current subscription invoice has not been paid. You cannot renew the subscription until previous has been paid");
        }

        $invoice = OrganisationInvoice::createSubscriptionInvoice(
            $subscription->organisation_id,
            $subscription->subscription_type_id,
            $length,
            'Subscription Renewal'
        );

        if( !$invoice ) {
            throw new Exception("Could not create subscription renewal invoice");
        }

        $newSubscription = OrganisationSubscription::createNewSubscription(
            $subscription->organisation_id,
            $subscription->subscription_type_id,
            $length,
            $invoice->id
        );

        if( !$newSubscription ) {
            throw new Exception('Could not create subscription renewal entry');
        }

        return $newSubscription;
    }

    /**
     * Upgrade a subscription to a higher tier
     */
    public function upgrade($orgSubscriptionId, $newSubscriptionTypeId, $length) {
        $subscription = OrganisationSubscription::with('organisation')->find($orgSubscriptionId);

        if( !$subscription ) {
            throw new Exception("Subscription to upgrade not found");
        }

        $invoice = OrganisationInvoice::createSubscriptionInvoice(
            $subscription->organisation_id,
            $newSubscriptionTypeId,
            $length,
            'Subscription Upgrade'
        );

        if( !$invoice ) {
            throw new Exception("Could not create subscription upgrade invoice");
        }

        $newSubscription = OrganisationSubscription::createNewSubscription(
            $subscription->organisation_id,
            $newSubscriptionTypeId,
            $length,
            $invoice->id
        );

        if( !$newSubscription ) {
            throw new Exception('Could not create subscription upgrade entry');
        }

        return $newSubscription;
    }

}
