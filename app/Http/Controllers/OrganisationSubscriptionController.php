<?php 

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationSubscriptionRenewalRequest;
use App\Http\Requests\OrganisationSubscriptionUpgradeRequest;
use App\Models\OrganisationSubscription;
use App\Services\SubscriptionManagementService;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationSubscriptionController extends ApiController
{
    public $subscriptionManager;

    public function __construct(
        OrganisationSubscription $organisationSubscription, 
        SubscriptionManagementService $subscriptionManager
    ) {
        parent::__construct($organisationSubscription);

        $this->subscriptionManager = $subscriptionManager;
    }

    /**
     * Pass the current subscription to be renewed
     * Pass the renewal length
     * 
     * Auto determine organisation_id
     * Auto determine current subscription_type
     * 
     * Actions: create an invoice for the transaction, return new subscription with invoice 
     */
    public function renew(OrganisationSubscriptionRenewalRequest $request, $id) {
        $subscription = $this->subscriptionManager->renew($id, $request->length);

        return new $this->Resource($subscription);
    }

    /**
     * Pass the current subscription to be upgraded
     * Pass the new subscription_type to upgrade to
     * Pass the subscription length
     * 
     * Auto determine organisation_id
     * 
     * Actions: create an invoice for the transaction, insert new subscription with invoice info
     */
    public function upgrade(OrganisationSubscriptionUpgradeRequest $request, $id) {
        $subscription = $this->subscriptionManager->upgrade($id, $request->subscription_type_id, $request->length);

        return new $this->Resource($subscription);
    }
} 