<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationAnniversary extends ApiModel  
{
    use BelongsToTenants, LogModelActivity;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_anniversaries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'organisation_member_anniversary_count', 'show_on_reg_forms', 'send_anniversary_message', 'message', 'notify_on_anniversary', 'created', 'modified', 'active'];

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
    protected $casts = ['show_on_reg_forms' => 'boolean', 'send_anniversary_message' => 'boolean', 'notify_on_anniversary' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * Format user activities description for organisation account
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $anniversary = $this;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("roles_and_permissions")
            ->setDescriptionForEvent(function (string $eventName) use ($anniversary) {
                if ($eventName == 'created') {
                    return __("Created anniversary \":name\" with message \":message\" for organisation \":org\"", [
                        "name" => $anniversary->name,
                        "message" => $anniversary->message,
                        'org' => $$anniversary->organisation->name,
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated anniversary \":name\" with message \":message\" for organisation \":org\"", [
                        "name" => $anniversary->name,
                        "message" => $anniversary->message,
                        'org' => $$anniversary->organisation->name,
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted anniversary \":name\" with message \":message\" for organisation \":org\"", [
                        "name" => $anniversary->name,
                        "message" => $anniversary->message,
                        'org' => $$anniversary->organisation->name,
                    ]);
                }
            });
    }

}
