<?php

namespace App\Services;

use App\Models\MemberAccount;

class TwofaService {

    public function handleTwofa(MemberAccount $account) {
        if ($account->isEmailTwofaRequired()) {
            $account->emailTwoFa();
        }
    }
}
