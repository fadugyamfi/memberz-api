<?php

namespace App\Providers;

use App\Models\MemberContribution;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationFileImport;
use App\Models\OrganisationInvoice;
use App\Models\OrganisationInvoiceItem;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationSubscription;
use App\Models\SmsAccountMessage;
use App\Models\SmsBroadcast;
use App\Observers\MemberContributionObserver;
use App\Observers\OrganisationAccountObserver;
use App\Observers\OrganisationFileImportObserver;
use App\Observers\OrganisationInvoiceItemObserver;
use App\Observers\OrganisationInvoiceObserver;
use App\Observers\OrganisationMemberCategoryObserver;
use App\Observers\OrganisationMemberObserver;
use App\Observers\OrganisationObserver;
use App\Observers\OrganisationSubscriptionObserver;
use App\Observers\SmsAccountMessageObserver;
use App\Observers\SmsBroadcastObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        OrganisationAccount::observe(OrganisationAccountObserver::class);
        OrganisationMemberCategory::observe(OrganisationMemberCategoryObserver::class);
        OrganisationMember::observe(OrganisationMemberObserver::class);
        Organisation::observe(OrganisationObserver::class);
        OrganisationSubscription::observe(OrganisationSubscriptionObserver::class);
        OrganisationInvoice::observe(OrganisationInvoiceObserver::class);
        OrganisationInvoiceItem::observe(OrganisationInvoiceItemObserver::class);
        SmsAccountMessage::observe(SmsAccountMessageObserver::class);
        SmsBroadcast::observe(SmsBroadcastObserver::class);
        OrganisationFileImport::observe(OrganisationFileImportObserver::class);
        MemberContribution::observe(MemberContributionObserver::class);
    }
}
