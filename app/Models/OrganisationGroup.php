<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationGroup extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag;

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
            ->useLogName("organisation_account")
            ->setDescriptionForEvent(function (string $eventName) use ($org, $name, $group_type) {
                if ($eventName == 'created') {
                    return __("Added organisation group \":name\" for organisation \":org_name\" with group type of \":group_type\"", [
                        "org_name" => $org->name,
                        'name' => $name,
                        'group_type' => $group_type,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated organisation group \":name\" for organisation \":org_name\" with group type of \":group_type\"", [
                        "org_name" => $org->name,
                        'name' => $name,
                        'group_type' => $group_type,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted organisation group\":name\" for organisation \":org_name\" with group type of \":group_type\"", [
                        "org_name" => $org->name,
                        'name' => $name,
                        'group_type' => $group_type,
                    ]);
                }
            });
    }

}
