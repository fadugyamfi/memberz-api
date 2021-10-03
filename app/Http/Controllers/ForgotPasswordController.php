<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Models\Member;
use App\Models\MemberAccount;
use App\Services\AuthLogService;
use Illuminate\Support\Facades\Password;

/**
 * @group Auth
 */
class ForgotPasswordController extends Controller
{
    /**
     * Forgot Password
     *
     * Send a reset password link to user email. This endpoint allows user to reset their forgotten password.
     */
    public function __invoke(ForgotPasswordRequest $request, AuthLogService $logger)
    {
        $status = Password::sendResetLink($request->only('username'));

        if( $status === Password::INVALID_USER ) {
            return response()->json(['message' => 'Invalid user / email specified'], 404);
        }

        if ($status !== Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Error sending forgot password reset link'], 401);
        }

        $account = MemberAccount::whereUsername($request->only('username'))->first();
        $logger->logPasswordResetLinkRequested($account);

        return response()->json(['message' => 'Forgot password reset link sent']);
    }
}
