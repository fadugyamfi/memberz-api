<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Twofa extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public string $code){}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@memberz.org', 'Memberz.Org Support')
                    ->subject(__('Two Factor Authentication Verification'))
                    ->markdown('emails.users.twofa', ['code' => $this->code]);
    }
}
