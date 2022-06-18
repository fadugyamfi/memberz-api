<?php

namespace App\Notifications;

use App\Channels\MemberzDbNotification;
use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminUserCreated extends BaseNotification implements ShouldQueue
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

    public function via($notifiable)
    {
        return ['mail', MemberzDbNotification::class];
    }

    public function setupNotification($notifiable) {
        $this->setNotificationTypeByName('organisation_account_access_granted')
            ->withParameters([
                '{member_name}' => $this->getMemberName($notifiable),
                '{org_name}' => $this->organisation->name,
                '{role_name}' => $this->role->name
            ]);
    }

    public function toArray($notifiable)
    {
        $this->setupNotification($notifiable);

        return parent::toArray($notifiable);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $this->setupNotification($notifiable);

        $url = url( config('app.web_url') . '/portal/notifications');

        return (new MailMessage)
                    ->greeting(__("Hi {$notifiable->member->first_name}"))
                    ->line($this->getFormattedMessage())
                    ->action(__('Activate Account'), $url)
                    ->line(__('Thank you for using our application!'));
    }
}
