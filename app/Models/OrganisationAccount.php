<?php

namespace App\Models;

use App\Notifications\AdminUserCreated;
use App\Notifications\OrganisationAccountRoleChanged;
use App\Traits\SoftDeletesWithActiveFlag;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationAccount extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag;

    protected static $logTitle = "Organisation Account";
    protected static $logName = "organisation_account";

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_accounts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'member_account_id', 'organisation_role_id', 'created', 'modified', 'notifications', 'weekly_updates', 'active', 'deleted'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['weekly_updates' => 'boolean', 'active' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationRole() {
        return $this->belongsTo(OrganisationRole::class);
    }

    public function memberAccount() {
        return $this->belongsTo(MemberAccount::class);
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function scopeOrganisationIds($query, int $member_account_id) {
        return $query->where('member_account_id', $member_account_id)->active()->get()->pluck('organisation_id')->all();
    }

    /**
     * Creates a default Administrator Account for the organisation
     */
    public static function createDefaultAccount(Organisation $organisation) {
        $defaultRole = OrganisationRole::firstOrCreate(
            ['organisation_id' => $organisation->id, 'name' => 'Administrator'],
            [
                'name' => 'Administrator',
                'admin_access' => 1,
                'weekly_activity_update' => 1,
                'birthday_updates' => 1,
                'active' => 1
            ]
        );

        return self::create([
            'organisation_id' => $organisation->id,
            'member_account_id' => auth()->user()->id,
            'organisation_role_id' => $defaultRole->id,
            'notifications' => 1,
            'weekly_updates' => 1,
            'active' => 1,
            'deleted' => 0
        ]);
    }
    

    public function sendAccountRoleChangedNotification() : void {
        $member_account = MemberAccount::find($this->member_account_id);
        $member_account->notify(new OrganisationAccountRoleChanged($this->organisation_role_id, $this->organisation_id));
    }

    public function sendAccountCreatedNotification() : void {
        $member_account = MemberAccount::find($this->member_account_id);
        $member_account->notify(new AdminUserCreated($this->organisation_role_id, $this->organisation_id));
    }
}
