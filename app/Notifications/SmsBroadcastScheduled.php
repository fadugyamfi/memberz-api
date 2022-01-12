<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\SmsBroadcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SmsBroadcastScheduled extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public SmsBroadcast $smsBroadcast,
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
        $notification_type = NotificationType::whereName('sms_broadcast_processing_complete')->first();

        $this->notification_type_id = $notification_type->id;
        $this->message = $notification_type->template;
        $this->title = $notification_type->email_subject;

        $this->replace_words_arr = [
            '{broadcast_list_name}' =>  $this->smsBroadcast->smsBroadcastList?->name ?? $this->smsBroadcast->organisationMemberCategory?->name,
            '{org_name}' => $this->organisation->name
        ];

        return $this->formatMessage();
    }
}
