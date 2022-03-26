<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Bus\Queueable;

class AdminUserCreated extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Organisation $organisation,
        public OrganisationRole $organisationRole
    ) {}

    public function toArray($notifiable)
    {
        $this->setNotificationTypeByName('organisation_account_access_granted')
            ->withParameters([
                '{member_name}' => $this->getMemberName($notifiable),
                '{org_name}' => $this->organisation->name,
                '{role_name}' => $this->role->name
            ]);

        return parent::toArray($notifiable);
    }
}
