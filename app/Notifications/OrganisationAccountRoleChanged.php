<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrganisationAccountRoleChanged extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected Organisation $organisation,
        protected OrganisationRole $organisationRole
    ) {}

    public function toArray($notifiable)
    {
        $this->setNotificationTypeByName('organisation_account_role_changed')->withParameters([
            '{member_name}' => $this->getMemberName($notifiable),
            '{org_name}' => $this->organisation->name,
            '{role_name}' => $this->role->name
        ]);

        return parent::toArray($notifiable);
    }
}
