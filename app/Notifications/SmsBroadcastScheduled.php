<?php

namespace App\Notifications;

use App\Models\Organisation;
use App\Models\SmsBroadcast;
use Illuminate\Bus\Queueable;

class SmsBroadcastScheduled extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Organisation $organisation,
        public SmsBroadcast $smsBroadcast
    ) {}

    public function toArray($notifiable)
    {
        $this->setNotificationTypeByName('sms_broadcast_processing_complete')->withParameters([
            '{broadcast_list_name}' =>  $this->smsBroadcast->smsBroadcastList?->name ?? $this->smsBroadcast->organisationMemberCategory?->name,
            '{org_name}' => $this->organisation->name
        ]);

        return parent::toArray($notifiable);
    }
}
