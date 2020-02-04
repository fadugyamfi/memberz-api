<?php 

namespace App\Services;

use App\Models\OrganisationInvoice;
use App\Models\OrganisationSubscription;
use Exception;

class SubscriptionManagementService {

    
    public function renew($orgSubscriptionId, $length) {
        $subscription = OrganisationSubscription::with('organisation')->find($orgSubscriptionId);

        if( !$subscription ) {
            throw new Exception("Subscription to renew not found");
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

    public function upgrade($orgSubscriptionId, $newSubscriptionTypeId, $length) {
        $subscription = OrganisationSubscription::with('organisation')->find($orgSubscriptionId);

        if( !$subscription ) {
            throw new Exception("Subscription to renew not found");
        }

        $invoice = OrganisationInvoice::createSubscriptionInvoice(
            $subscription->organisation_id,
            $newSubscriptionTypeId,
            $length,
            'Subscription Renewal'
        );

        if( !$invoice ) {
            throw new Exception("Could not create subscription renewal invoice");
        }

        $newSubscription = OrganisationSubscription::createNewSubscription(
            $subscription->organisation_id, 
            $newSubscriptionTypeId, 
            $length, 
            $invoice->id
        );

        if( !$newSubscription ) {
            throw new Exception('Could not create subscription renewal entry');
        }

        return $newSubscription;
    }

}