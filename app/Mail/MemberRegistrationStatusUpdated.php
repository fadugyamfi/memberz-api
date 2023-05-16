<?php

namespace App\Mail;

use App\Models\OrganisationMember;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class MemberRegistrationStatusUpdated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, IsMonitored;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public OrganisationMember $membership)
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
        $approved = $this->membership->approved == 1 && $this->membership->active == 1;
        $canceled = $this->membership->approved == 0 && $this->membership->active == 0;
        $organisation_name = $this->membership->organisation->name;
        $member_name = $this->membership->member->first_name;

        return $this->markdown('emails.users.memberregistrationupdated', compact('approved', 'canceled', 'organisation_name', 'member_name'));
    }
}
