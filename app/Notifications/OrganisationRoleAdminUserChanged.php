<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class OrganisationRoleAdminUserChanged extends Notification
{
    use Queueable;

    /**
     * @var
     */
    private $role_id;

    /**
     * @var
     */
    private $organisation_id;

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

        return [
            'message' => "Your acount organisation role for the organisation, {$organisation}, has been changed by Administrator to {$role}",
            'organisation_id' => $this->organisation_id,
            'notification_type_id' => NotificationType::whereName('organisation_account_role_changed')->first()->id,
        ];
    }


    public function toDatabase($notifiable) {
        return $this->toArray($notifiable);
    }

}
