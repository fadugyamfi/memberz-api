<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use Spatie\Permission\Traits\HasPermissions;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationRole extends ApiModel
{

    use BelongsToTenants, HasPermissions, SoftDeletesWithActiveFlag;

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
    
}
