<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ResetPasswordRequest;
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
    public function __invoke(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('username', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ]);

                $user->save();
            }
        );

        if ($status !== Password::PASSWORD_RESET){
            return response()->json(['error' => 'Error resetting password.'], 401);
        }

        return response()->json(['message' => 'Password reset successful.']);
    }
}
