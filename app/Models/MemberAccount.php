<?php

namespace App\Models;

use App\Mail\PasswordReset;
use App\Traits\SoftDeletesWithActiveFlag;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MemberAccount extends Authenticatable implements ApiModelInterface, JWTSubject
{

    use Notifiable, ApiModelBehavior, SoftDeletesWithActiveFlag;

    const DELETED_AT = 'active';

    protected $table = 'member_accounts';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['member_id', 'username', 'password', 'pass_salt', 'timezone', 'account_type', 'reset_requested', 'active', 'deleted', 'email_verification_token'];

    protected $hidden = ['password', 'pass_salt'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function organisationAccounts()
    {
        return $this->hasMany(OrganisationAccount::class)->where('organisation_accounts.active', 1);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'username' => $this->username,
            'member_id' => $this->member_id,
            'organisation_ids' => $this->organisationAccounts()->get()->pluck('organisation_id'),
        ];
    }

    /**
     * Since we are working on transitioning from the old system to this new API,
     * we'll need to check if password in database is MD5 and then hash it and return it.
     * Else assume password is a valid bcrypt password and just return it
     */
    public function getAuthPassword()
    {
        return $this->isValidMd5($this->password) ? Hash::make($this->password) : $this->password;
    }

    /**
     * Validate if a string is an MD5 Hash
     */
    public function isValidMd5($md5 = '')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public static function createTempAccount(int $member_id)
    {
        $existingAccount = self::where('member_id', $member_id)->active()->first();

        if ($existingAccount) {
            return $existingAccount;
        }

        $member = Member::find($member_id);

        if (!$member) {
            Log::error("Could not create temporary member account. Member profile does not exist for member_id {$member_id}");
            return false;
        }

        return self::create([
            'member_id' => $member_id,
            'username' => $member->email,
            'password' => Hash::make(rand(10000, 99999)),
            'active' => 1,
        ]);
    }

    /** Create new member accont */
    public function createAccount(array $input): MemberAccount
    {
        return self::create([
            'member_id' => $input['member_id'],
            'username' => $input['username'],
            'password' => bcrypt($input['password']),
            'email_verification_token' => Str::random(30),
        ]);
    }

    public function getEmailForPasswordReset()
    {
        return $this->username;
    }

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->username)->send(new PasswordReset($token));
    }

    public function unsentNotifications() {
        return $this->unreadNotifications()->where('sent', 0);
    }

}
