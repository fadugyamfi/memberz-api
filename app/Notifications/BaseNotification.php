<?php

namespace App\Notifications;

use App\Channels\MemberzDbNotification;
use App\Models\MemberAccount;
use App\Models\NotificationType;
use App\Models\Organisation;
use Illuminate\Notifications\Notification;

abstract class BaseNotification extends Notification
{

    protected array $notificationParams = [];
    public NotificationType $notificationType;
    public Organisation $organisation;


    public function setNotificationTypeByName(string $name) {
        return $this->setNotificationType(
            NotificationType::whereName($name)->first()
        );
    }

    public function withParameters(array $parameters) {
        return $this->setNotificationParameters($parameters);
    }

    public function setNotificationType(NotificationType $notificationType) {
        $this->notificationType = $notificationType;
        return $this;
    }

    public function getNotificationType(): NotificationType {
        return $this->notificationType;
    }

    public function setNotificationParameters(array $parameters) {
        $this->notificationParams = $parameters;
        return $this;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [MemberzDbNotification::class];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->getFormattedMessage(),
            'title' => $this->getNotificationType()?->email_subject,
            'organisation_id' => $this->organisation?->id,
            'notification_type_id' => $this->getNotificationType()?->id,
        ];
    }

    public function getFormattedMessage() {
        $message = $this->getNotificationType()?->template;

        return str_replace(array_keys($this->notificationParams), array_values($this->notificationParams), $message);
    }

    public function getMemberName($notifiable) {
        return $notifiable->member->first_name . ' '. $notifiable->member->last_name;
    }

    public function toDatabase($notifiable) {
        return $this->toArray($notifiable);
    }

}
