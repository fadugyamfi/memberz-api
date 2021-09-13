<?php

namespace App\Observers;

use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationInvoice;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationSubscription;
use App\Services\SubscriptionManagementService;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class OrganisationObserver
{

    /**
     * Handle the organisation "created" event.
     *
     * @param  \App\Organisation  $organisation
     * @return void
     */
    public function creating(Organisation $organisation)
    {
        $organisation->generateSlug();
        $organisation->uuid = Uuid::uuid4();
        $organisation->active = 1;
    }

    /**
     * Handle the organisation "created" event.
     *
     * @param  \App\Organisation  $organisation
     * @return void
     */
    public function created(Organisation $organisation)
    {
        $subscriptionTypeId = intval(request('subscription_type_id'));
        $subscriptionLength = intval(request('subscription_length'));

        $subscriptionManagementService = new SubscriptionManagementService();
        $subscriptionManagementService->createNewSubscription($organisation->id, $subscriptionTypeId, $subscriptionLength);

        $account = OrganisationAccount::createDefaultAccount($organisation);
        $category = OrganisationMemberCategory::createDefault($organisation);
        OrganisationMember::createDefaultMember($organisation, $category, $account);
    }

}
