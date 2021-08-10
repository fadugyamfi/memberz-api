<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\VerificationEmail;
use App\Models\Member;
use App\Models\MemberAccount;
use Illuminate\Support\Facades\Mail;

/**
 * @group Auth
 */
class AuthController extends Controller
{
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
    
        $member = (new Member())->store($request);
        
        $member_account_data = ['member_id' => $member->id, 'username' => $request->email, 'password' => $request->password];
        
        $member_account = (new MemberAccount)->createAccount($member_account_data);

        Mail::to($member_account->username)->send(new VerificationEmail($member_account->email_verification_token));
        
        return response()->json(['message' => 'Successfully created account']);

    }

    public function verifyEmail(string $token = null){
        if ($token === null) {
            return response()->json(['error' => 'Invalid login attempt'], 401);
        }

        $member_account = MemberAccount::whereEmailVerificationToken($token)->first();

        if (! $member_account) {
            return response()->json(['error' => 'Invalid login attempt'], 401);
        }

        $member_account->email_verification_token = null;
        $member_account->active = true;
        $member_account->save();

        return response()->json(['message' => 'Account creation verification successful']);
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
