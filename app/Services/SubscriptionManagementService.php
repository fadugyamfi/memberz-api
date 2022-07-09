<?php

namespace App\Services;

use App\Models\Organisation;
use App\Models\OrganisationInvoice;
use App\Models\OrganisationInvoiceItem;
use App\Models\OrganisationSubscription;
use App\Models\SubscriptionType;
use App\Models\TransactionType;
use DateInterval;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Log;
use NunoMazer\Samehouse\Facades\Landlord;

class SubscriptionManagementService {

    public function createNewSubscription(Organisation $organisation, $subscription_type_id, $length) {
        $invoice = $this->createInvoice(
            $organisation,
            $subscription_type_id,
            $length,
            'Subscription Purchase'
        );

        if( !$invoice ) {
            throw new Exception("Could not create subscription renewal invoice");
        }

        $newSubscription = $this->createSubscription(
            $organisation->id,
            $subscription_type_id,
            $length,
            $invoice->id
        );

        if( !$newSubscription ) {
            throw new Exception('Could not create subscription renewal entry');
        }

        return $newSubscription;
    }

    /**
     * Renews a subscription at a current tier
     */
    public function renew($orgSubscriptionId, $length) {
        $subscription = OrganisationSubscription::with(['organisationInvoice', 'organisation'])->find($orgSubscriptionId);

        if( !$subscription ) {
            throw new Exception("Subscription to renew not found");
        }

        if( $subscription->organisationInvoice->paid == 0 ) {
            throw new Exception("Current subscription invoice has not been paid. You cannot renew the subscription until previous has been paid");
        }

        $invoice = $this->createInvoice(
            $subscription->organisation,
            $subscription->subscription_type_id,
            $length,
            'Subscription Renewal'
        );

        if( !$invoice ) {
            throw new Exception("Could not create subscription renewal invoice");
        }

        $newSubscription = $this->createSubscription(
            $subscription->organisation_id,
            $subscription->subscription_type_id,
            $length,
            $invoice->id
        );

        if( !$newSubscription ) {
            throw new Exception('Could not create subscription renewal entry');
        }

        activity()
            ->inLog("subscriptions")
            ->causedBy(auth()->user())
            ->performedOn($newSubscription)
            ->event('renewal')
            ->tap(function($activity) {
                $activity->organisation_id = Landlord::getTenants()->first();
            })
            ->log(__("Created subscription renewal invoice"));

        return $newSubscription;
    }

    /**
     * Upgrade a subscription to a higher tier
     */
    public function upgrade($orgSubscriptionId, $newSubscriptionTypeId, $length) {
        $subscription = OrganisationSubscription::with(['organisation'])->find($orgSubscriptionId);

        if( !$subscription ) {
            throw new Exception("Subscription to upgrade not found");
        }

        $invoice = $this->createInvoice(
            $subscription->organisation,
            $newSubscriptionTypeId,
            $length,
            'Subscription Upgrade'
        );

        if( !$invoice ) {
            throw new Exception("Could not create subscription upgrade invoice");
        }

        $newSubscription = $this->createSubscription(
            $subscription->organisation_id,
            $newSubscriptionTypeId,
            $length,
            $invoice->id
        );

        if( !$newSubscription ) {
            throw new Exception('Could not create subscription upgrade entry');
        }

        activity()
            ->inLog("subscriptions")
            ->causedBy(auth()->user())
            ->performedOn($newSubscription)
            ->event('upgrade')
            ->tap(function($activity) {
                $activity->organisation_id = Landlord::getTenants()->first();
            })
            ->log(__("Created subscription upgrade invoice"));

        return $newSubscription;
    }

    /**
     * Create Invoice
     */
    public function createInvoice(Organisation $organisation, int $subscriptionTypeId, int $subscriptionLength, string $transactionType = 'Subscription Purchase')
    {
        $transactionType = TransactionType::where('name', $transactionType)->first();
        $subscriptionType = SubscriptionType::find($subscriptionTypeId);

        $invoice = OrganisationInvoice::create([
            'organisation_id' => $organisation->id,
            'transaction_type_id' => $transactionType->id,
            'currency_id' => $subscriptionType->currency_id,
            'paid' => $subscriptionType->billing_required == 'yes' ? 0 : 1,
            'member_account_id' => $organisation->member_account_id,
            'due_date' => date('Y-m-d H:i:s', strtotime("+7 days")),
            'notes' => "Your new organisation will be temporarily enabled for <b>7 days</b> within which you will be required to make
                    payment for your chosen subscription via any cash, cheque or bank transfer to the indicated bank account. <br /><br />

                    Your new organisation setup will be disabled after <b>7 days</b> pending payment.",
        ]);

        if ($invoice) {
            $this->addInvoiceItems($invoice, $subscriptionType, $subscriptionLength);
            $this->applyDiscounts($invoice, $subscriptionType, $subscriptionLength);
            $this->applyProratedDiscountOnUpgrade($invoice, $subscriptionType, $subscriptionLength, $transactionType->name);
        }

        return $invoice;
    }

    public function addInvoiceItems(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength)
    {
        $invoice->organisationInvoiceItems()->saveMany([
            new OrganisationInvoiceItem([
                'qty' => $subscriptionLength,
                'product_type' => 'subscription',
                'product_id' => $subscriptionType->id,
                'description' => $subscriptionType->description . ' Subscription ' . ($subscriptionType->billing_required ? '(1 Month)' : ''),
                'unit_price' => $subscriptionType->initial_price,
                'total' => $subscriptionLength * doubleval($subscriptionType->initial_price),
            ]),
        ]);
    }

    public function applyDiscounts(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength)
    {
        $discountMonths = floor($subscriptionLength / 6);

        if ($discountMonths) {
            $invoice->organisationInvoiceItems()->saveMany([
                new OrganisationInvoiceItem([
                    'qty' => $discountMonths,
                    'product_type' => 'subscription',
                    'product_id' => $subscriptionType->id,
                    'description' => $subscriptionType->description . ' Subscription Discount',
                    'unit_price' => -$subscriptionType->initial_price,
                    'total' => -intval($discountMonths) * doubleval($subscriptionType->initial_price),
                ]),
            ]);
        }
    }

    public function applyProratedDiscountOnUpgrade(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength, string $transactionType)
    {
        if ($transactionType != 'Subscription Upgrade') {
            return;
        }

        $subscription = $invoice->organisation->activeSubscription;

        if ($subscription->hasProrateDiscount()) {
            $invoice->organisationInvoiceItems()->saveMany([
                new OrganisationInvoiceItem([
                    'qty' => 1,
                    'product_type' => 'subscription',
                    'product_id' => $subscriptionType->id,
                    'description' => $subscriptionType->description . ' Prorate Discount',
                    'unit_price' => -$subscription->remaining_balance,
                    'total' => -$subscription->remaining_balance,
                ]),
            ]);
        }
    }

    /**
     * Creates a new subscription for an organisation with the specified paramaters
     */
    public function createSubscription($organisationId, $subscriptionTypeId, $length, $organisationInvoiceId = null) {

        $currentSubscription = Organisation::find($organisationId)->activeSubscription;

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
        return OrganisationSubscription::create([
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
