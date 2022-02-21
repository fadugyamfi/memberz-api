<?php

namespace App\Mail;

use App\Models\OrganisationMember;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberRegistrationStatusUpdated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

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
        $message = "We are sorry to let you know that your registration for membership into the organisation, {$this->organisationMember->organisation->name}, on Memberz.org has been rejected.";

        if ( $this->organisationMember->approved == 1 && $this->organisationMember->active == 1) {
            $message = "We are glad to let you know that your registration for membership into the organisation, {$this->organisationMember->organisation->name}, on Memberz.org has been approved.";
        }
        return $this->markdown('emails.users.memberregistrationupdated', [compact('message')]);
    }
}
