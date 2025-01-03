<?php

namespace App\Models;

use App\Notifications\AdminUserCreated;
use App\Notifications\InsufficientSmsCredits;
use App\Notifications\InsufficientSmsCreditsForBroadcast;
use App\Notifications\OrganisationAccountRoleChanged;
use App\Notifications\SmsBroadcastScheduled;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithDeletedFlag;
use App\Traits\HasCakephpTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Models\Permission;

class OrganisationAccount extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithDeletedFlag, HasCakephpTimestamps, LogModelActivity, HasFactory;

    const DELETED_AT = 'deleted';

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

    protected $appends = ['membership'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationRole()
    {
        return $this->belongsTo(OrganisationRole::class);
    }

    public function memberAccount()
    {
        return $this->belongsTo(MemberAccount::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeOrganisationIds($query, int $member_account_id)
    {
        return $query->where('member_account_id', $member_account_id)->active()->get()->pluck('organisation_id')->all();
    }

    public function getMembershipAttribute() {
        return OrganisationMember::where('member_id', $this->memberAccount?->member_id)->first();
    }

    /**
     * Creates a default Administrator Account for the organisation
     */
    public static function createDefaultAccount(Organisation $organisation)
    {
        $defaultRole = OrganisationRole::firstOrCreate(
            ['organisation_id' => $organisation->id, 'name' => 'Administrator'],
            [
                'name' => 'Administrator',
                'admin_access' => 1,
                'weekly_activity_update' => 1,
                'birthday_updates' => 1,
                'active' => 1,
                'guard_name' => 'api'
            ]
        );

        $defaultRole->givePermissionTo( Permission::all() );

        return self::create([
            'organisation_id' => $organisation->id,
            'member_account_id' => $organisation->creator?->id, // auth()->user()->id,
            'organisation_role_id' => $defaultRole->id,
            'notifications' => 1,
            'weekly_updates' => 1,
            'active' => 1,
            'deleted' => 0,
        ]);
    }

    public function sendAccountRoleChangedNotification(): void
    {
        $this->memberAccount?->notify(new OrganisationAccountRoleChanged($this->organisation, $this->organisationRole));
    }

    public function sendAccountCreatedNotification(): void
    {
        $this->memberAccount?->notify(new AdminUserCreated($this->organisation, $this->organisationRole));
    }

    public function notifySmsBroadcastProcessed(SmsBroadcast $broadcast): void
    {
        $this->memberAccount?->notify(new SmsBroadcastScheduled($this->organisation, $broadcast));
    }

    public function notifyInsufficientSmsCredits(): void
    {
        $this->memberAccount?->notify(new InsufficientSmsCredits($this->organisation));
    }

    public function notifyInsufficientSmsCreditsForBroadcast(SmsBroadcast $smsBroadcast): void
    {
        $this->memberAccount?->notify(new InsufficientSmsCreditsForBroadcast($this->organisation, $smsBroadcast));
    }

    /**
     * Format user activities description for organisation account
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $member = $this->memberAccount->member;
        $org = $this->organisation;
        $role = $this->organisationRole;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("roles_and_permissions")
            ->setDescriptionForEvent(function (string $eventName) use ($member, $org, $role) {
                if ($eventName == 'created') {
                    return __("Created admin account for \":member\" with role \":role\"", [
                        "member" => $member->name,
                        "org_name" => $org->name,
                        'role' => $role->name,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated admin account of \":member\". Current role: \":role\"", [
                        "member" => $member->name,
                        "org_name" => $org->name,
                        'role' => $role->name,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted admin account of \":member\" from \":org_name\"", [
                        "member" => $member->name,
                        "org_name" => $org->name,
                        'role' => $role->name,
                    ]);
                }
            });
    }
}
