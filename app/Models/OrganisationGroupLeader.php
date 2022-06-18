<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationGroupLeader extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_group_leaders';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_group_id', 'organisation_member_id', 'role', 'created', 'modified', 'active'];

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
    protected $casts = ['active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function organisationGroup(){
        return $this->belongsTo(OrganisationGroup::class);
    }

    public function organisationMember(){
        return $this->belongsTo(OrganisationMember::class);
    }


     /**
     * Format user activities description for organisation group leader
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $org_name = $this->organisation->name;
        $role = $this->role;
        $group = $this->organisationGroup->name;
        $leader = $this->organisationMember->member->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("groups")
            ->setDescriptionForEvent(function (string $eventName) use ($leader, $org_name, $role, $group) {
                if ($eventName == 'created') {
                    return __("Made \":leader\" a leader of \":group\" in \":org_name\". Role: \":role\"", [
                        "org_name" => $org_name,
                        'role' => $role,
                        'group' => $group,
                        'leader' => $leader
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated group leader record for \":leader\" in \":org_name\". Current Role:  \":role\"", [
                        "org_name" => $org_name,
                        'role' => $role,
                        'group' => $group,
                        'leader' => $leader
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted group leader record for \":leader\" in \":org_name\"", [
                        "org_name" => $org_name,
                        'role' => $role,
                        'group' => $group,
                        'leader' => $leader
                    ]);
                }
            });
    }

}
