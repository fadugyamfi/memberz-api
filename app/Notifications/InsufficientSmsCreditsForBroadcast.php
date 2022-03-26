<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\SmsBroadcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InsufficientSmsCreditsForBroadcast extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Organisation $organisation,
        public SmsBroadcast $smsBroadcast,
    ) {}

    public function toArray($notifiable)
    {
        $this->setNotificationTypeByName('sms_broadcast_low_credit')
            ->withParameters([
                '{org_name}' => $this->organisation->name,
                '{broadcast_list_name}' =>  $this->smsBroadcast->smsBroadcastList?->name ?? $this->smsBroadcast->organisationMemberCategory?->name,
            ]);

        return parent::toArray($notifiable);
    }

}
