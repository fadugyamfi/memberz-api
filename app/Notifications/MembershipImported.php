<?php

namespace App\Notifications;

use App\Models\NotificationType;
use App\Models\Organisation;
use App\Models\OrganisationFileImport;
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
        public OrganisationFileImport $fileImport,
        protected string $status = "Completed",
        protected string $reason = ""
    ) {
        $this->organisation = $this->fileImport->organisation;
    }

    public function toArray($notifiable)
    {
        $this->setNotificationTypeByName('bulk_member_import_status')
            ->withParameters([
                '{file_name}' =>  $this->fileImport->file_name,
                '{org_name}' => $this->organisation->name,
                '{status}' => $this->status,
                '{reason}' => $this->reason
            ]);

        return parent::toArray($notifiable);
    }

}
