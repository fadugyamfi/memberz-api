<?php

namespace App\Http\Controllers;

use App\Http\Requests\TwoFaCheckRequest;
use App\Http\Requests\TwoFASendCodeRequest;
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
    public function sendCode(TwoFASendCodeRequest $request){
        $code = $this->twofaService->generateCode(auth()->user());
        
        if ($request->verification_type == 'email') {
            $this->twofaService->sendTwoFaEmailCode(auth()->user(), $code);
        } else if ($request->verification_type == 'mobile_number'){
            $this->twofaService->sendTwoFaSmsCode(auth()->user(), $code);
        }

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

        return response()->json(["status" => "success", "message" => __("Two Factor Authentication Enabled")]);
    }

    /**
     * 2FA - Disable
     */
    public function disable(){
        auth()->user()->update([ 'email_2fa' => false ]);

        return response()->json(["status" => "success", "message" => __("Two Factor Authentication Disabled.")]);
    }
}
