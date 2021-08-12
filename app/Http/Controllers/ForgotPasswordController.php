<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function store(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('username'));

        if ($status !== Password::RESET_LINK_SENT) {
            return response()->json(['error' => 'Error sending forgot password reset link'], 401);
        }

        return response()->json(['message' => 'Forgot password reset link sent']);
    }
}
