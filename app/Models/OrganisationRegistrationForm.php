<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasPermissions;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationRegistrationForm extends ApiModel
{

    use BelongsToTenants, HasPermissions, LogModelActivity, SoftDeletes;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'slug', 'organisation_id', 'organisation_member_category_id', 'name', 'description', 'expiration_dt', 'excluded_standard_fields', 'custom_fields', 'deleted_at'];

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
    protected $casts = ['form_enabled' => 'boolean', 'excluded_stardard_fields' => 'array', 'custom_fields' => 'array'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['expiration_dt', 'deleted_at'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function registrants() {
        return $this->hasMany(OrganisationMember::class);
    }

    public function approvedRegistrants() {
        return $this->hasMany(OrganisationMember::class)->where('approved', 1)->where('active', 1);
    }

    public function unapprovedRegistrants() {
        return $this->hasMany(OrganisationMember::class)->where('approved', 0)->where('active', 1);
    }

      /**
     * Format user activities description for organisation registration form
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $org = $this->organisation;
        $name = $this->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("organisation")
            ->setDescriptionForEvent(function (string $eventName) use ($org, $name) {
                if ($eventName == 'created') {
                    return __("Added organisation registration form \":name\" to :org_name", [
                        "org_name" => $org->name,
                        'name' => $name,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated organisation registration form \":name\" in :org_name", [
                        "org_name" => $org->name,
                        'name' => $name,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted organisation registration form \":name\" in :org_name", [
                        "org_name" => $org->name,
                        'name' => $name,
                    ]);
                }
            });
    }

}
