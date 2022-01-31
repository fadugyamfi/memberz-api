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
        $this->twofaService->emailTwoFa(auth()->user());

        return response()->json(["status" => "success", "message" => "2FA code sent"]);
    }

    /**
     * 2FA - Enable
     */
    public function enable(TwoFaCheckRequest $request){
        if(! $this->twofaService->isValid($request->code, auth()->user())){
            return response()->json(['status' => "error", 'message' => __("Invalid 2FA Code or 2FA Code Expired")], 404);
        }

        auth()->user()->update([ 'email_2fa' => true ]);

        return response()->json(["status" => "success", "message" => __("E-Mail verifidation enabled")]);
    }

    /**
     * 2FA - Disable
     */
    public function disable(){
        auth()->user()->update([ 'email_2fa' => false ]);

        return response()->json(["status" => "success", "message" => __("E-Mail verifidation disabled")]);
    }
}
