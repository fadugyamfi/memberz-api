<?php

namespace App\Services;

use App\Mail\Twofa;
use App\Models\MemberAccount;
use App\Models\MemberAccountCode;
use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use Illuminate\Support\Facades\Mail;

class TwoFactorAuthService {

    public function handle(MemberAccount $account) {
        $this->handleTwoFa($account);
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
    public function handleTwoFa(MemberAccount $account): void
    {
        $code = $this->generateCode($account);

        if (filter_var(request()->username, FILTER_VALIDATE_EMAIL)) {
            Mail::to($account->username)->queue(new Twofa($code));
            $this->log2FACodeSent($account);
        } else {
            $this->sendTwoFaSsmsCode($account, $code);
            $this->log2FACodeSent($account, 'phone');
        }
        
    }


    /**
     * Send 2FA code via sms
     */
    public function sendTwoFaSsmsCode(MemberAccount $account, string $code): void {
        $memberzSmsAccountId = 1;
        $smsAccount = SmsAccount::find( $memberzSmsAccountId);
        
        SmsAccountMessage::create([
            'module_sms_account_id' => $memberzSmsAccountId,
            'organisation_id' => $smsAccount->organisation_id,
            'member_id' => $account->id,
            'to' => $account->mobile_number,
            'message' => __("[Memberz.org] Your login verfication code is {$code}."),
            'sender_id' => $smsAccount->sender_id
        ]);

    }

    public function log2FACodeSent(MemberAccount $account, $type = 'email') {

        $log = [];
        if ($type == 'email'){
            $log['email'] = $account->username;
        } else {
            $log['mobile_number'] = $account->mobile_number;
        }

        activity()
            ->inLog("Auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('2FA')
            ->log(__("2FA code sent to :address", $log));
    }

    public function isTwoFaEnabled(MemberAccount $account) : bool{
        return $account->isEmailTwofaRequired();
    }

    public function isValid(string $code, MemberAccount $account){
        $memberAccountCode = $account->memberAccountCode;
        return $code == $memberAccountCode->code && $memberAccountCode->expires_at > now();
    }
}
