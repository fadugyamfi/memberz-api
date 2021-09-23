<?php

namespace App\Http\Controllers;

use App\Models\MemberAccount;
use App\Services\AuthLogService;

/**
 * @group Auth
 */
class VerifyEmailController extends Controller
{
    /**
     * Verify Account
     *
     * Verify Newly Created User Account
     *
     * This endpoint provides email verification for newly created user accounts
     *
     * @response 401 {
     *    "message": "Invalid login attempt"
     * }
     *
     * @response {
     *    "message": "Account creation verification successful"
     * }
     */
    public function __invoke(string $token = null, AuthLogService $logger)
    {
        if ($token === null) {
            return response()->json(['message' => 'Invalid login attempt'], 401);
        }

        $member_account = MemberAccount::whereEmailVerificationToken($token)->first();

        if (! $member_account) {
            return response()->json(['message' => 'Invalid login attempt'], 401);
        }

        $member_account->email_verification_token = null;
        $member_account->active = true;
        $member_account->save();

        $logger->logAccountActivated($member_account);

        return response()->json(['message' => 'Account creation verification successful']);
    }
}
