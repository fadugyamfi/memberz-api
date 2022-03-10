<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use Illuminate\Bus\Queueable;

class MembershipImported extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected string $file_name,
        protected int $organisation_id,
        protected string $status = "Completed",
        protected string $reason = ""
    ) {}


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $organisation = Organisation::find($this->organisation_id)->name;
        $notification_type = NotificationType::whereName('bulk_member_import_status')->first();
        $this->notification_type_id = $notification_type->id;

        $this->message = $notification_type->template;
        $this->title = $notification_type->email_subject;

        $this->replace_words_arr = [
            '{file_name}' =>  $this->file_name,
            '{org_name}' => $organisation,
            '{status}' => $this->status,
            '{reason}' => $this->reason
        ];

        $this->formatMessage();

        return $this->getData();
    }

}
