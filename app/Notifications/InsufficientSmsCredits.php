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
    )
    {
        //
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $notification_type = NotificationType::whereName('sms_low_credit')->first();

        $this->notification_type_id = $notification_type->id;
        $this->message = $notification_type->template;
        $this->title = $notification_type->email_subject;

        $this->replace_words_arr = [
            '{org_name}' => $this->organisation->name
        ];

        return $this->formatMessage();
    }
}
