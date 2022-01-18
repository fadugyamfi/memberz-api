<?php

namespace App\Services;

use App\Models\MemberAccount;
use Illuminate\Support\Facades\Log;

class TwofaService {

    public function handle(MemberAccount $account) {
        if ($account->isEmailTwofaRequired()) {
            $account->emailTwoFa();
            $this->log2FACodeSent($account);
        }
    }


    public function log2FACodeSent(MemberAccount $account) {
        activity()
            ->inLog("2FA")
            ->causedBy($account)
            ->performedOn($account)
            ->event('2FA')
            ->log(__("2FA code sent to :email", ['email' => $account->username]));
    }

    public function isValid(MemberAccount $account){
        $memberAccountCode = $account->memberAccountCode;

        if( request()->code != $memberAccountCode->code || $memberAccountCode->expires_at < now()) {
            return false;
        }

        return true;
    }
}
