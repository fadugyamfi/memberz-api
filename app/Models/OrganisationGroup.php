<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationGroup extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_groups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_group_type_id', 'name', 'organisation_member_group_count', 'created', 'modified', 'active'];


    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function organisationGroupType(){
        return $this->belongsTo(OrganisationGroupType::class);
    }

    public function organisationGroupLeaders() {
        return $this->hasMany(OrganisationGroupLeader::class);
    }

    public function organisationGroupMembers() {
        return $this->hasMany(OrganisationMemberGroup::class);
    }

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


     /**
     * Format user activities description for organisation group
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $org = $this->organisation;
        $name = $this->name;
        $group_type = $this->organisationGroupType->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("groups")
            ->setDescriptionForEvent(function (string $eventName) use ($org, $name, $group_type) {
                if ($eventName == 'created') {
                    return __("Created group \":name\" in \":group_type\"", [
                        "org_name" => $org->name,
                        'name' => $name,
                        'group_type' => $group_type,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated group \":name\" in \":group_type\"", [
                        "org_name" => $org->name,
                        'name' => $name,
                        'group_type' => $group_type,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted group \":name\" from \":group_type\" in \":org_name\"", [
                        "org_name" => $org->name,
                        'name' => $name,
                        'group_type' => $group_type,
                    ]);
                }
            });
    }

}
