<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class Organisation extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisations';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_type_id', 'name', 'slug', 'address', 'city', 'state', 'post_code', 'country_id', 'currency_id', 'email', 'phone', 'website', 'logo', 'short_description', 'long_description', 'mission', 'cover_photo', 'member_account_id', 'organisation_member_count', 'organisation_account_count', 'discoverable', 'allow_public_join', 'default_public_join_category', 'public_directory_enabled', 'locked', 'verified', 'verified_by', 'created', 'modified', 'active', 'trashed'];

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
    protected $casts = ['discoverable' => 'boolean', 'allow_public_join' => 'boolean', 'locked' => 'boolean', 'verified' => 'boolean', 'trashed' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

}
