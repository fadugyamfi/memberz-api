<?php

namespace App\Notifications;

use App\Channels\MemberzDbNotification;
use App\Models\Organisation;
use App\Models\SmsBroadcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class InsufficientSmsCreditsForBroadcast extends BaseNotification implements ShouldQueue
{
    use Queueable, IsMonitored;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Organisation $organisation,
        public SmsBroadcast $smsBroadcast,
    ) {}

    public function via($notifiable)
    {
        return ['mail', MemberzDbNotification::class];
    }

    public function setupNotification($notifiable) {
        $this->setNotificationTypeByName('sms_broadcast_low_credit')
            ->withParameters([
                '{org_name}' => $this->organisation->name,
                '{broadcast_list_name}' =>  $this->smsBroadcast->smsBroadcastList?->name ?? $this->smsBroadcast->organisationMemberCategory?->name,
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
                    ->subject(__('SMS Credits Needed For Broadcast'))
                    ->greeting(__("Hi {$notifiable->member->first_name}"))
                    ->line($this->getFormattedMessage())
                    ->action(__('View Broadcasts'), $url)
                    ->line(__('Thank you for using our application!'));
    }
}
