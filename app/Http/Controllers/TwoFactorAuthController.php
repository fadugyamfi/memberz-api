<?php

namespace App\Http\Controllers;

use App\Http\Requests\TwoFaCheckRequest;
use App\Models\MemberAccount;
use App\Services\TwoFactorAuthService;

/**
 * @group Auth
 */
class TwoFactorAuthController extends Controller
{
    public function __construct(private TwoFactorAuthService $twofaService){}

    /**
     * 2FA - Send Code
     */
    public function sendCode(){
        $memberAccount = MemberAccount::find(auth()->user()->id);
        $this->twofaService->emailTwoFa($memberAccount);

        return response()->json(["status" => "success", "message" => "2FA code sent"]);
    }

    /**
     * 2FA - Enable
     */
    public function enable(TwoFaCheckRequest $request){
        $memberAccount = MemberAccount::find(auth()->user()->id);

        if(! $this->twofaService->isValid($request->code, $memberAccount)){
            return response()->json(['status' => "error", 'message' => __("Invalid 2FA Code or 2FA Code Expired")], 404);
        }

        $memberAccount->email_2fa = true;
        $memberAccount->save();

        return response()->json(["status" => "success", "message" => "E-Mail verifidation enabled"]);
    }

    /**
     * 2FA - Disable
     */
    public function disable(){
        $memberAccount = MemberAccount::find(auth()->user()->id);
        $memberAccount->email_2fa = false;
        $memberAccount->save();

        return response()->json(["status" => "success", "message" => "E-Mail verifidation disabled"]);
    }
}
