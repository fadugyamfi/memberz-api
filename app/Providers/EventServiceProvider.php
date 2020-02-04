<?php

namespace App\Providers;

use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationInvoice;
use App\Models\OrganisationInvoiceItem;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationSubscription;
use App\Observers\OrganisationAccountObserver;
use App\Observers\OrganisationInvoiceItemObserver;
use App\Observers\OrganisationInvoiceObserver;
use App\Observers\OrganisationMemberCategoryObserver;
use App\Observers\OrganisationMemberObserver;
use App\Observers\OrganisationObserver;
use App\Observers\OrganisationTypeObserver;
use App\Observers\OrganisationSubscriptionObserver;
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
        OrganisationType::observe(OrganisationTypeObserver::class);
        OrganisationSubscription::observe(OrganisationSubscriptionObserver::class);
        OrganisationInvoice::observe(OrganisationInvoiceObserver::class);
        OrganisationInvoiceItem::observe(OrganisationInvoiceItemObserver::class);
    }
}
