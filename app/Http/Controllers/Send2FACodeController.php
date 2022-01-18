<?php

namespace App\Http\Controllers;

use App\Models\MemberAccount;
use App\Services\TwofaService;

/**
 * @group 2FA
 */
class Send2FACodeController extends Controller
{
    public function __construct(private TwofaService $twofaService){}

    public function __invoke(){
        $memberAccount = MemberAccount::find(auth()->user()->id);
        $memberAccount->emailTwoFa();
        $this->twofaService->log2FACodeSent($memberAccount);

        return response()->json(["status" => "success", "message" => "2FA code sent"]);
    }
}
