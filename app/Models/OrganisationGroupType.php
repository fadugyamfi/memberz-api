<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use Illuminate\Database\Eloquent\Model;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationGroupType extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_group_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'show_on_reg_forms','allow_multi_select','created', 'modified', 'active'];


    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function organisationGroups(){
        return $this->hasMany(OrganisationGroup::class);
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
     * Format user activities description for organisation group type
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $org = $this->organisation->name;
        $name = $this->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("organisation_account")
            ->setDescriptionForEvent(function (string $eventName) use ($org, $name) {
                if ($eventName == 'created') {
                    return __("Added organisation type \":name\" for organisation \":org_name\"", [
                        "org_name" => $org->name,
                        'name' => $name
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated organisation type \":name\" for organisation \":org_name\"", [
                        "org_name" => $org->name,
                        'name' => $name
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted organisation type \":name\" for organisation \":org_name\"", [
                        "org_name" => $org->name,
                        'name' => $name
                    ]);
                }
            });
    }

}
