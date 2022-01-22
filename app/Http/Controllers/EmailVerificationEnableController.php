<?php

namespace App\Http\Controllers;

use App\Http\Requests\TwoFaCheckRequest;
use App\Models\MemberAccount;
use App\Services\TwofaService;

/**
 * @group 2FA
 */
class EmailVerificationEnableController extends Controller
{
    public function __construct(private TwofaService $twofaService){}

    public function __invoke(TwoFaCheckRequest $request){
        $memberAccount = MemberAccount::find(auth()->user()->id);

        if(! $this->twofaService->isValid($memberAccount)){
            return response()->json(['status' => "error", 'message' => __("Invalid 2FA Code or 2FA Code Expired")], 404);
        }

        $memberAccount->email_2fa = true;
        $memberAccount->save();

        return response()->json(["status" => "success", "message" => "E-Mail verifidation enabled"]);
    }
}
