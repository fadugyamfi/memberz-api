<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsufficientSmsCredits extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Organisation $organisation
    ) {}

    public function toArray($notifiable)
    {
        $this->setNotificationTypeByName('sms_low_credit')
            ->withParameters([
                '{org_name}' => $this->organisation->name
            ]);

        return parent::toArray($notifiable);
    }

}
