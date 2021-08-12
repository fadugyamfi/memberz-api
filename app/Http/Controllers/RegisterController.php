<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Member;
use App\Models\MemberAccount;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;

/**
 * @group Auth
 */
class RegisterController extends Controller
{
    /**
     * Register new user/member
     * 
     * This endpoint allows to create new user account.
     */
    public function __invoke(RegisterRequest $request)
    {
        $member = (new Member())->store($request);
        
        $member_account_data = ['member_id' => $member->id, 'username' => $request->email, 'password' => $request->password];
        
        $member_account = (new MemberAccount)->createAccount($member_account_data);

        Mail::to($member_account->username)->send(new VerificationEmail($member_account->email_verification_token));
        
        return response()->json(['message' => 'Successfully created account']);
    }
}
