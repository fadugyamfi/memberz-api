<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Member;
use App\Models\MemberAccount;
use App\Services\AuthLogService;

/**
 * @group Auth
 */
class AuthController extends Controller
{

    private AuthLogService $authLogger;

    public function __construct(AuthLogService $authLogger)
    {
        $this->authLogger = $authLogger;
    }

    /**
     * Login
     *
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     * @unauthenticated
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->oldLoginAttempt();
        }

        $this->authLogger->logLoginSuccess( auth()->user() );

        return $this->respondWithToken($token);
    }

    public function oldLoginAttempt()
    {
        $credentials = request(['username', 'password']);
        $account = MemberAccount::where('username', $credentials['username'])->where('active', 1)->first();

        if( !$account ) {
            return response()->json(['error' => 'Unauthorized', 'message' => 'Account not found'], 404);
        }

        $credentials['password'] = md5($credentials['password'] . $account->pass_salt);

        if (! $token = auth()->attempt($credentials)) {
            $this->authLogger->logLoginFailure($account);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->authLogger->logLoginSuccess($account);

        return $this->respondWithToken($token, true);
    }

    /**
     * User Profile
     *
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        $memberAccount = MemberAccount::with([
            'member.profilePhoto',
            'organisationAccounts' => function($q) {
                $q->active()->with('organisation');
            }
        ])->find($user->id);

        return response()->json($memberAccount);
    }

    /**
     * Logout
     *
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->authLogger->logLogout( auth()->user() );

        auth()->logout();

        return response()->json(['message' => __('Successfully logged out')]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $oldLoginAttempt = false)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'old_login' => $oldLoginAttempt
        ]);
    }
}
