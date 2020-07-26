<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use LaravelApiBase\Models\CommonFunctions;
use LaravelApiBase\Models\CommonModel;

class MemberAccount extends Authenticatable implements CommonModel, JWTSubject
{

    use Notifiable, CommonFunctions;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = 'member_accounts';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['member_id', 'username', 'password', 'pass_salt', 'timezone', 'account_type', 'reset_requested', 'active', 'deleted'];

    protected $hidden = ['password', 'pass_salt'];

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function organisationAccount() {
        return $this->hasMany(OrganisationAccount::class);
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
        return [];
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
    function isValidMd5($md5 = '')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public static function createTempAccount(int $member_id) {
        $existingAccount = self::where('member_id', $member_id)->active()->first();

        if( $existingAccount ) {
            return $existingAccount;
        }

        $member = Member::find($member_id);

        if( !$member ) {
            Log::error("Could not create temporary member account. Member profile does not exist for member_id {$member_id}");
            return false;
        }

        return self::create([
            'member_id' => $member_id,
            'username' => $member->email,
            'password' => Hash::make( rand(10000,99999) ),
            'active' => 1
        ]);
    }
}
