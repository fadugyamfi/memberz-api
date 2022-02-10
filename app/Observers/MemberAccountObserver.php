<?php

namespace App\Observers;

use App\Mail\NewUserRegistered;
use App\Models\MemberAccount;
use App\Services\AuthLogService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MemberAccountObserver
{

    public AuthLogService $logger;

    public function __construct(AuthLogService $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the member account "updated" event.
     *
     * @param  \App\Models\MemberAccount  $memberAccount
     * @return void
     */
    public function updated(MemberAccount $memberAccount)
    {

    }

    public function creating(MemberAccount $memberAccount) {
        if( $memberAccount->password && !preg_match('/^\$2y\$/', $memberAccount->password) ) {
            $memberAccount->password = bcrypt($memberAccount->password);
        }

        $memberAccount->email_verification_token = Str::random(30);
    }

    public function created(MemberAccount $member_account) {
        $this->logger->logNewAccountRegistered($member_account);

        Mail::to($member_account->username)->queue(new NewUserRegistered($member_account->email_verification_token));
    }
}
