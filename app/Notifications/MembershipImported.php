<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MembershipImported extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        private string $file_name,
        private int $organisation_id,
        private string $status = "Completed",
        private string $reason = ""
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
