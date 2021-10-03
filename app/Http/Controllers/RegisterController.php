<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\NewUserRegistered;
use App\Models\Member;
use App\Models\MemberAccount;
use App\Services\AuthLogService;
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
     *
     * @response {
     *   "message": "Successfully created account"
     * }
     */
    public function __invoke(RegisterRequest $request, AuthLogService $logger)
    {
        $member = (new Member())->store($request);

        $member_account_data = ['member_id' => $member->id, 'username' => $request->email, 'password' => $request->password];

        $member_account = (new MemberAccount)->createAccount($member_account_data);

        $logger->logNewAccountRegistered($member_account);

        Mail::to($member_account->username)->send(new NewUserRegistered($member_account->email_verification_token));

        return response()->json(['message' => 'Successfully created account']);
    }
}
