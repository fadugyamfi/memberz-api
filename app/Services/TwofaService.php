<?php

namespace App\Services;

use App\Models\MemberAccount;

class TwofaService {

    public function handle(MemberAccount $account) {
        if ($account->isEmailTwofaRequired()) {
            $account->emailTwoFa();
            $this->log2FACodeSent($account);
        }
    }


    private function log2FACodeSent(MemberAccount $account) {
        activity()
            ->inLog("2FA")
            ->causedBy($account)
            ->performedOn($account)
            ->event('2FA')
            ->log(__("2FA code sent to :email", ['email' => $account->username]));
    }
}
