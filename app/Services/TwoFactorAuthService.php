<?php

namespace App\Services;

use App\Mail\Twofa;
use App\Models\MemberAccount;
use App\Models\MemberAccountCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TwoFactorAuthService {

    public function handle(MemberAccount $account) {
        if (!$account->isEmailTwofaRequired()) {
            return;
        }

        $this->emailTwoFa($account);
    }

    public function generateCode(MemberAccount $account) {
        $code = rand(100000, 999999);

        MemberAccountCode::create([
            'member_account_id' => $account->id,
            'code' => $code,
            'expires_at' => now()->addMinutes(config('auth.twofa.email.expires')),
        ]);

        return $code;
    }

    /**
     * Create or Update E-mail verification code and send code to email
     */
    public function emailTwoFa(MemberAccount $account)
    {
        $code = $this->generateCode($account);

        Mail::to($account->username)->send(new Twofa($code));

        $this->log2FACodeSent($account);
    }

    public function log2FACodeSent(MemberAccount $account) {
        activity()
            ->inLog("Auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('2FA')
            ->log(__("2FA code sent to :email", ['email' => $account->username]));
    }

    public function isValid(string $code, MemberAccount $account){
        $memberAccountCode = $account->memberAccountCode;

        return $code == $memberAccountCode->code && $memberAccountCode->expires_at > now();
    }
}
