<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class SupportRole extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'support_roles';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'manage_members', 'manage_organisations', 'manage_support_users', 'manage_reports', 'access_reports', 'manage_images', 'manage_system_settings', 'created', 'modified', 'active'];

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
    protected $casts = ['manage_members' => 'boolean', 'manage_organisations' => 'boolean', 'manage_support_users' => 'boolean', 'manage_reports' => 'boolean', 'access_reports' => 'boolean', 'manage_images' => 'boolean', 'manage_system_settings' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
