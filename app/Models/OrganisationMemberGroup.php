<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationMemberGroup extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_groups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'organisation_group_id', 'created', 'modified', 'active'];

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
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationMember() {
        return $this->belongsTo(OrganisationMember::class);
    }

    public function organisationGroup() {
        return $this->belongsTo(OrganisationGroup::class);
    }

}
