<?php

namespace App\Providers;

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

        \App\Models\OrganisationAccount::observe( \App\Observers\OrganisationAccountObserver::class );
        \App\Models\OrganisationMemberCategory::observe( \App\Observers\OrganisationMemberCategoryObserver::class );
        \App\Models\OrganisationMember::observe( \App\Observers\OrganisationMemberObserver::class );
        \App\Models\Organisation::observe( \App\Observers\OrganisationObserver::class );
        \App\Models\OrganisationSubscription::observe( \App\Observers\OrganisationSubscriptionObserver::class );
        \App\Models\OrganisationInvoice::observe( \App\Observers\OrganisationInvoiceObserver::class );
        \App\Models\OrganisationInvoiceItem::observe( \App\Observers\OrganisationInvoiceItemObserver::class );
        \App\Models\SmsAccountMessage::observe( \App\Observers\SmsAccountMessageObserver::class );
        \App\Models\SmsBroadcast::observe( \App\Observers\SmsBroadcastObserver::class );
        \App\Models\OrganisationFileImport::observe( \App\Observers\OrganisationFileImportObserver::class );
        \App\Models\Contribution::observe( \App\Observers\ContributionObserver::class );
        \App\Models\SmsBroadcastList::observe( \App\Observers\SmsBroadcastListObserver::class );
        \App\Models\OrganisationGroup::observe( \App\Observers\OrganisationGroupObserver::class );
        \App\Models\MemberAccount::observe( \App\Observers\MemberAccountObserver::class );
        \App\Models\SmsAccountTopup::observe( \App\Observers\SmsAccountTopupObserver::class );
        \App\Models\OrganisationRegistrationForm::observe( \App\Observers\OrganisationRegistrationFormObserver::class );
        \App\Models\OrganisationPaymentPlatform::observe( \App\Observers\OrganisationPaymentPlatformObserver::class );
        \App\Models\OrganisationMemberGroup::observe( \App\Observers\OrganisationMemberGroupObserver::class );

        \App\Models\Events\Event::observe( \App\Observers\Events\EventObserver::class );
    }
}
