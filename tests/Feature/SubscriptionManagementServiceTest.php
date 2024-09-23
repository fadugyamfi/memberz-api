<?php

namespace Tests\Feature;

use App\Mail\OrganisationInvoiceCreated;
use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\SubscriptionType;
use App\Services\SubscriptionManagementService;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SubscriptionManagementServiceTest extends TestCase
{
    /**
     * Test creating a new subscription completes successfully
     */
    public function testNewSubcriptionIsCreatedForOrganisation(): void
    {
        Mail::fake();

        $account = MemberAccount::factory()->create();
        $organisation = Organisation::factory()->create([
            'member_account_id' => $account->id
        ]);

        $subscriptionType = SubscriptionType::where('name', SubscriptionType::FREE_PLAN_NAME)->first();

        $subscriptionService = new SubscriptionManagementService();
        $subscription = $subscriptionService->createNewSubscription($organisation, $subscriptionType->id, 12);

        $this->assertNotNull($subscription);
        $this->assertEquals(SubscriptionType::FREE_PLAN_NAME, $subscription->subscriptionType->name);
        
        // free plan invoices should automatically be marked as paid
        $this->assertEquals(1, $subscription->organisationInvoice->paid); 

        Mail::assertQueued(OrganisationInvoiceCreated::class);
    }

    /**
     * Test renewing  subscription completes successfully
     */
    public function testRenewingOrganisationSubscriptionSucceeds(): void
    {
        Mail::fake();

        $account = MemberAccount::factory()->create();
        $organisation = Organisation::factory()->create([
            'member_account_id' => $account->id
        ]);

        $subscriptionType = SubscriptionType::where('name', SubscriptionType::BASIC_PLAN_NAME)->first();

        $subscriptionService = new SubscriptionManagementService();
        $subscription = $subscriptionService->createNewSubscription($organisation, $subscriptionType->id, 1);

        $this->assertNotNull($subscription);
        $this->assertEquals(SubscriptionType::BASIC_PLAN_NAME, $subscription->subscriptionType->name);
        $this->assertEquals(0, $subscription->organisationInvoice->paid);

        // mark the invoice as paid in order to be able to renew the subscription
        $subscription->organisationInvoice->markPaid();

        // renew the subscription
        $renewedSubscription = $subscriptionService->renew($subscription->id, 6);

        $this->assertNotNull($renewedSubscription);
        $this->assertNotEmpty($renewedSubscription->organisation_invoice_id);
        $this->assertEquals(6, $renewedSubscription->length); // 6 months
        $this->assertEquals(1, $renewedSubscription->current); // is current
        $this->assertEquals(0, $renewedSubscription->organisationInvoice->paid); // is unpaid

        Mail::assertQueued(OrganisationInvoiceCreated::class);
    }

    /**
     * Test upgrading a subscription completes successfully
     */
    public function testOrganisationSubscriptionUpgradeSucceeds(): void
    {
        Mail::fake();

        $account = MemberAccount::factory()->create();
        $organisation = Organisation::factory()->create([
            'member_account_id' => $account->id
        ]);

        $subscriptionType = SubscriptionType::where('name', SubscriptionType::BASIC_PLAN_NAME)->first();

        $subscriptionService = new SubscriptionManagementService();
        $subscription = $subscriptionService->createNewSubscription($organisation, $subscriptionType->id, 1);

        $this->assertNotNull($subscription);
        $this->assertEquals(SubscriptionType::BASIC_PLAN_NAME, $subscription->subscriptionType->name);
        $this->assertEquals(0, $subscription->organisationInvoice->paid);

        // mark the invoice as paid in order to be able to renew the subscription
        $subscription->organisationInvoice->markPaid();

        // renew the subscription
        $upgradeSubscriptionType = SubscriptionType::where('name', SubscriptionType::PRO_PLAN_NAME)->first();
        $upgradedSubscription = $subscriptionService->upgrade($subscription->id, $upgradeSubscriptionType->id, 6);

        $this->assertNotNull($upgradedSubscription);
        $this->assertNotEmpty($upgradedSubscription->organisation_invoice_id);
        $this->assertEquals(6, $upgradedSubscription->length); // 6 months
        $this->assertEquals(1, $upgradedSubscription->current); // is current
        $this->assertEquals(0, $upgradedSubscription->organisationInvoice->paid); // is unpaid

        Mail::assertQueued(OrganisationInvoiceCreated::class);
    }
}
