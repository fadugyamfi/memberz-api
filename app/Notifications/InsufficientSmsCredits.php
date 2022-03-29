<?php

namespace App\Notifications;

use App\Channels\MemberzDbNotification;
use App\Models\Organisation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class InsufficientSmsCredits extends BaseNotification implements ShouldQueue
{
    use Queueable, IsMonitored;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Organisation $organisation
    ) {}

    public function via($notifiable)
    {
        return ['mail', MemberzDbNotification::class];
    }

    public function setupNotification($notifiable) {
        $this->setNotificationTypeByName('sms_low_credit')
            ->withParameters([
                '{org_name}' => $this->organisation->name
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
                    ->action(__('Purchase Credits'), $url)
                    ->line(__('Thank you for using our application!'));
    }
}
