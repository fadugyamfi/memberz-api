<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\TwoFaCheckRequest;
use App\Models\MemberAccount;
use App\Services\AuthLogService;
use App\Services\TwoFactorAuthService;

/**
 * @group Auth
 */
class AuthController extends Controller
{

    /**
     * @var MemberAccount $account
     */
    private $account;

    public function __construct(private AuthLogService $authLogger, private TwoFactorAuthService $twofaService)
    {
        $this->account = auth()->user() ?? null;
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
        $credentials  = $this->getLoginCredentials();

        if (!$token = auth()->attempt($credentials)) {
            return $this->oldLoginAttempt();
        }

        $this->account = auth()->user();

        $this->authLogger->logLoginSuccess($this->account);

        if ($this->account->isEmailTwofaRequired()) {
            $this->twofaService->handle($this->account);
            return response()->json(['status' => '2fa', 'message' => '2FA Code Required']);
        }

        return $this->respondWithToken($token);
    }

    private function getLoginCredentials() : array
    {
        if (filter_var(request()->get('username'), FILTER_VALIDATE_EMAIL)) {
            return ['username' => request()->get('email'), 'password' => request()->get('password')];
        }
        
        return ['mobile_number' => request()->get('username'), 'password' => request()->get('password')];
    }

    public function oldLoginAttempt()
    {
        $credentials = request(['username', 'password']);
        $account = MemberAccount::where('username', $credentials['username'])->where('active', 1)->first();

        if (!$account) {
            return response()->json(['error' => 'Unauthorized', 'message' => 'Account not found'], 404);
        }

        $credentials['password'] = md5($credentials['password'] . $account->pass_salt);

        if (!$token = auth()->attempt($credentials)) {
            $this->authLogger->logLoginFailure($account);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->authLogger->logLoginSuccess($account);

        $this->account = auth()->user();

        if ($this->account->isEmailTwofaRequired()) {
            $this->twofaService->handle($this->account);
            return response()->json(['status' => '2fa', 'message' => '2FA Code Required']);
        }

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

        if (!$user) {
            return response()->json(["status" => "error", 'message' => __("Unauthenticated")], 404);
        }

        $memberAccount = MemberAccount::with([
            'member.profilePhoto',
            'organisationAccounts' => function ($q) {
                $q->active()->with('organisation');
            }
        ])->find($user->id);

        return response()->json($memberAccount);
    }


    /**
     * Get the validity of 2FA code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function twoFaValidate(TwoFaCheckRequest $request)
    {
        $memberAccount = MemberAccount::where('username', $request->username)->where('active', 1)->first();

        if (!$this->twofaService->isValid($request->code, $memberAccount)) {
            return response()->json(['status' => "error", 'message' => __("Invalid 2FA Code or 2FA Code Expired")], 404);
        }

        $token = auth()->attempt(request(['username', 'password']));

        return $this->respondWithToken($token, true);
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
        $this->authLogger->logLogout(auth()->user());

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
