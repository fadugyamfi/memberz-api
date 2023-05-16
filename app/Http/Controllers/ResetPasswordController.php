<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\MemberAccount;
use App\Services\AuthLogService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

/**
 * @group Auth
 */
class ResetPasswordController extends Controller
{
    /**
     * Reset Password
     *
     * @response {
     *   "message": "Password reset successful"
     * }
     *
     * @response 401 {
     *   "message": "Error resetting password"
     * }
     */
    public function __invoke(ResetPasswordRequest $request, AuthLogService $logger)
    {
        $status = Password::reset(
            $request->only('username', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ]);

                $user->save();

                Log::info("Password reset successfully for {$user->username}");
            }
        );

        if ($status === Password::INVALID_USER){
            return response()->json(['message' => 'Invalid user credentials'], 401);
        }

        if ($status === Password::INVALID_TOKEN){
            return response()->json(['message' => 'Invalid token for password reset'], 401);
        }

        if ($status !== Password::PASSWORD_RESET){
            return response()->json(['message' => 'Error resetting password.'], 401);
        }

        $account = MemberAccount::whereUsername($request->only('username'))->first();
        $logger->logPasswordReset($account);

        return response()->json(['message' => 'Password reset successful.']);
    }
}
