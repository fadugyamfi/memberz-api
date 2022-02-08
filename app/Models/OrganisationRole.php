<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use Spatie\Permission\Traits\HasPermissions;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationRole extends ApiModel
{

    use BelongsToTenants, HasPermissions, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_roles';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'admin_access', 'weekly_activity_update', 'birthday_updates', 'created', 'modified', 'active'];

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
    protected $casts = ['admin_access' => 'boolean', 'weekly_activity_update' => 'boolean', 'birthday_updates' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationAccounts() {
        return $this->hasMany(OrganisationAccount::class);
    }

    public function isAdmin() {
        return $this->admin_access == 1;
     }

      /**
     * Format user activities description for organisation role
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $org = $this->organisation;
        $role = $this->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("roles_and_permissions")
            ->setDescriptionForEvent(function (string $eventName) use ($org, $role) {
                if ($eventName == 'created') {
                    return __("Added role \":role\" to :org_name", [
                        "org_name" => $org->name,
                        'role' => $role,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated role \":role\" in :org_name", [
                        "org_name" => $org->name,
                        'role' => $role,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted role \":role\" from :org_name", [
                        "org_name" => $org->name,
                        'role' => $role,
                    ]);
                }
            });
    }

}
