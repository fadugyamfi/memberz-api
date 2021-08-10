<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Member;
use App\Models\MemberAccount;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @group Auth
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
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

        return $this->respondWithToken($token);
    }

    /**
     * Register new user
     */
    public function register(RegisterRequest $request){
        (new User())->store($request->only(['first_name', 'last_name', 'email', 'password']));

        (new Member())->store($request);

        if (! $token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

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
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token, true);
    }

    /**
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
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
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
