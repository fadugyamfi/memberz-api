<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationMemberMedical extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_medicals';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'member_id', 'blood_group', 'weight', 'weight_unit', 'height', 'height_unit', 'blood_pressure', 'blood_pressure_value', 'notes', 'feels_dizzy', 'feels_faint', 'has_heart_condition', 'has_chest_pain', 'has_asthma', 'has_diabetes', 'has_short_breath', 'has_epilepsy', 'has_joint_issues', 'created', 'modified', 'deleted'];

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
    protected $casts = ['deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
