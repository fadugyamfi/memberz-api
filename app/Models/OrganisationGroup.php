<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisationGroup extends ApiModel  
{

    

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

    public function organisation_group_type(){
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