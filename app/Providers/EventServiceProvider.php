<?php

namespace App\Providers;

use App\Models\Contribution;
use App\Models\Events\Event;
use App\Models\Member;
use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationFileImport;
use App\Models\OrganisationGroup;
use App\Models\OrganisationInvoice;
use App\Models\OrganisationInvoiceItem;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationPaymentPlatform;
use App\Models\OrganisationRegistrationForm;
use App\Models\OrganisationSubscription;
use App\Models\SmsAccountMessage;
use App\Models\SmsAccountTopup;
use App\Models\SmsBroadcast;
use App\Models\SmsBroadcastList;
use App\Observers\ContributionObserver;
use App\Observers\Events\EventObserver;
use App\Observers\MemberAccountObserver;
use App\Observers\MemberObserver;
use App\Observers\OrganisationAccountObserver;
use App\Observers\OrganisationFileImportObserver;
use App\Observers\OrganisationGroupObserver;
use App\Observers\OrganisationInvoiceItemObserver;
use App\Observers\OrganisationInvoiceObserver;
use App\Observers\OrganisationMemberCategoryObserver;
use App\Observers\OrganisationMemberObserver;
use App\Observers\OrganisationObserver;
use App\Observers\OrganisationPaymentPlatformObserver;
use App\Observers\OrganisationRegistrationFormObserver;
use App\Observers\OrganisationSubscriptionObserver;
use App\Observers\SmsAccountMessageObserver;
use App\Observers\SmsAccountTopupObserver;
use App\Observers\SmsBroadcastListObserver;
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
        Contribution::observe(ContributionObserver::class);
        SmsBroadcastList::observe(SmsBroadcastListObserver::class);
        OrganisationGroup::observe(OrganisationGroupObserver::class);
        MemberAccount::observe(MemberAccountObserver::class);
        SmsAccountTopup::observe(SmsAccountTopupObserver::class);
        OrganisationRegistrationForm::observe(OrganisationRegistrationFormObserver::class);
        OrganisationPaymentPlatform::observe(OrganisationPaymentPlatformObserver::class);

        Event::observe(EventObserver::class);
    }
}
