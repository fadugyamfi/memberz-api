<?php

namespace App\Observers;

use App\Models\Contribution;
use App\Models\ContributionReceiptSetting;
use App\Models\Currency;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationPaymentPlatform;
use App\Models\PaymentPlatform;
use App\Services\SubscriptionManagementService;
use NunoMazer\Samehouse\Facades\Landlord;
use Ramsey\Uuid\Uuid;

class OrganisationObserver
{

    /**
     * Handle the organisation "created" event.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return void
     */
    public function creating(Organisation $organisation)
    {
        $organisation->generateSlug();
        $organisation->uuid = Uuid::uuid4();
        $organisation->active = 1;

        if( $organisation->country_id ) {
            $organisation->currency_id = Currency::where('country_id', $organisation->country_id)->first()->id;
        }
    }

    /**
     * Handle the organisation "created" event.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return void
     */
    public function created(Organisation $organisation)
    {
        Landlord::addTenant($organisation);
        Landlord::applyTenantScopesToDeferredModels();

        $subscriptionTypeId = intval(request('subscription_type_id'));
        $subscriptionLength = intval(request('subscription_length'));

        $subscriptionManagementService = new SubscriptionManagementService();
        $subscriptionManagementService->createNewSubscription($organisation->id, $subscriptionTypeId, $subscriptionLength);

        $account = OrganisationAccount::createDefaultAccount($organisation);
        $account->sendAccountCreatedNotification();

        $category = OrganisationMemberCategory::createDefault($organisation);
        OrganisationMember::createDefaultMember($organisation, $category, $account);

        // do finance module setup
        ContributionReceiptSetting::setup($organisation);
        OrganisationPaymentPlatform::createSystemGeneratedCashPaymentPlatform($organisation);
    }
}
