<?php

namespace App\Notifications;

use App\Channels\MemberzDbNotification;
use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrganisationAdminRoleChanged extends BaseMemberzNotification
{
    use Queueable;

    /**
     * @var
     */
    private $role_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(int $role_id, int $organisation_id)
    {
        $this->role_id = $role_id;
        $this->organisation_id = $organisation_id;
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
        $organisation = Organisation::find($this->organisation_id)->name;
        $role = OrganisationRole::find($this->role_id)->name;
        $notification_type = NotificationType::whereName('organisation_account_role_changed')->first();

        $this->message = $notification_type->template;
        $this->title = $notification_type->email_subject;

        $this->replace_words_arr = [
            '{member_name}' =>  auth()->user()->username,
            '{org_name}' => $organisation,
            '{role_name}' => $role
        ];

        $this->formatMessage();

        return $this->getData();
    }

}
