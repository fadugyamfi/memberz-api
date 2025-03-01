<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;

class ModuleMenu extends ApiModel
{
    use HasCakephpTimestamps;
    
     /** 
     * Will not log any activity on []
     */
    protected static $recordEvents = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_menus';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['module_id', 'display_name', 'controller', 'action', 'arguments', 'icon', 'position', 'created', 'modified', 'active'];

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
