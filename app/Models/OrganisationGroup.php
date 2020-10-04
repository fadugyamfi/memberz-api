<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use Torzer\Awesome\Landlord\BelongsToTenants;

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

}
