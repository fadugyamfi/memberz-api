<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisationGroupType extends ApiModel  
{

    

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
    protected $fillable = ['organisation_id', 'name', 'description', 'show_on_reg_forms', 'allow_multi_select', 'created', 'modified', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function organisation()
        {
        return $this->belongsTo(Organisation::class);
        
        }


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['show_on_reg_forms' => 'boolean', 'allow_multi_select' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
