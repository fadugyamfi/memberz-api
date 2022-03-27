<?php

namespace App\Mail;

use App\Models\OrganisationMember;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class MemberFormRegistrationCompleted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, IsMonitored;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public OrganisationMember $organisationMember)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $organisation_name = $this->organisationMember->organisation->name;
        $member_name = $this->organisationMember->member->first_name;

        return $this->markdown('emails.users.memberformregistrationcompleted', compact('organisation_name', 'member_name'));
    }
}
