<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPasswordRequest;
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
    public function __invoke(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('username'));

        if( $status === Password::INVALID_USER ) {
            return response()->json(['message' => 'Invalid user / email specified'], 404);
        }

        if ($status !== Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Error sending forgot password reset link'], 401);
        }

        return response()->json(['message' => 'Forgot password reset link sent']);
    }
}
