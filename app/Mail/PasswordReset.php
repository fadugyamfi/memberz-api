<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Organisation;


class PasswordReset extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The organisation of the authenticated user.
     *
     * @var string
     */
    public $organisation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $username,
        public string $token
    ) {
        if ($tenantId = request()->header('X-Tenant-Id')){
            $organisation = Organisation::where('uuid', $tenantId)->first();
            $this->organisation = $organisation->name;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appResetURL = config('app.web_url') . "/auth/password-reset?email={$this->username}&token={$this->token}";

        if (! $this->organisation) {
            return $this->markdown('emails.users.passwordreset', ['url' => $appResetURL]);
        }

        return $this->markdown('emails.users.newaccountpasswordreset', ['url' => $appResetURL]);
    }
}
