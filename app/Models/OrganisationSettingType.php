<?php

namespace App\Models;

class OrganisationSettingType extends ApiModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_setting_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'type', 'default'];

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
    protected $dates = [];

    public function organisation_setting() {
        return $this->hasMany(OrganisationSetting::class);
    }
}
