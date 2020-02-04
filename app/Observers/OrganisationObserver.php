<?php

namespace App\Observers;

use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationInvoice;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationSubscription;
use Illuminate\Support\Str;

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
        if( !$organisation->slug ) {
            $organisation->slug = Str::slug($organisation->name) . '-' . rand(10000,99999);
        }

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
        $organisationInvoice = OrganisationInvoice::createSubscriptionInvoice($organisation->id, $subscriptionTypeId, $subscriptionLength);

        OrganisationSubscription::createNewSubscription($organisation->id, $subscriptionTypeId, $subscriptionLength, $organisationInvoice->id);
        $account = OrganisationAccount::createDefaultAccount($organisation);
        $category = OrganisationMemberCategory::createDefault($organisation);
        OrganisationMember::createDefaultMember($organisation, $category, $account);
    }

    /**
     * Handle the organisation "updated" event.
     *
     * @param  \App\Organisation  $organisation
     * @return void
     */
    public function updated(Organisation $organisation)
    {
        //
    }

    /**
     * Handle the organisation "deleted" event.
     *
     * @param  \App\Organisation  $organisation
     * @return void
     */
    public function deleted(Organisation $organisation)
    {
        //
    }

    /**
     * Handle the organisation "restored" event.
     *
     * @param  \App\Organisation  $organisation
     * @return void
     */
    public function restored(Organisation $organisation)
    {
        //
    }

    /**
     * Handle the organisation "force deleted" event.
     *
     * @param  \App\Organisation  $organisation
     * @return void
     */
    public function forceDeleted(Organisation $organisation)
    {
        //
    }
}
