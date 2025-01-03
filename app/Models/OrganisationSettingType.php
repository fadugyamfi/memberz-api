<?php

namespace App\Models;

class OrganisationSettingType extends ApiModel
{

    const AUTO_BIRTHDAY_MESSAGE = 13;
    const AUTO_BIRTHDAY_TIME = 14;

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

    public function organisationSettings() {
        return $this->hasMany(OrganisationSetting::class);
    }
}
