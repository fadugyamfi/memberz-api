<?php

namespace App\Mail;

use App\Models\MemberAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class NewUserRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, IsMonitored;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public MemberAccount $memberAccount
    ) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->memberAccount->email_verification_token;
        $member_name = $this->memberAccount->member->first_name;

        return $this->markdown('emails.users.created', [
            'url' => config('app.web_url') . '/' . $token,
            'member_name' => $member_name
        ]);
    }
}
