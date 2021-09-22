<?php

namespace App\Models;

class MemberCategorySetting extends ApiModel
{
    protected static $logTitle = "Member Category Setting";
    protected static $logName = "member_category_setting";

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member_category_settings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'type', 'default', 'position', 'created', 'modified', 'active'];

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

}
