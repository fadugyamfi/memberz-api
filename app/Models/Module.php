<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use Illuminate\Database\Eloquent\Model;

class Module extends ApiModel
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
    protected $table = 'modules';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'controller', 'action', 'arguments', 'icon', 'default_active', 'add_to_menu', 'menu_position', 'created', 'modified', 'active'];

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
    protected $casts = ['default_active' => 'boolean', 'add_to_menu' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
