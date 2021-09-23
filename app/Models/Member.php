<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;

class Member extends ApiModel
{

    use SoftDeletesWithActiveFlag;

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected static $logTitle = "Member";
    protected static $logName = "member";

    protected $guarded = ['id'];
    protected $fillable = ['title', 'first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile_number', 'email', 'website', 'occupation', 'profession', 'business_name', 'active'];

    protected $appends = ['full_name', 'full_name_with_title'];

    public function organisationMember()
    {
        return $this->hasMany(OrganisationMember::class);
    }

    public function memberships()
    {
        return $this->hasMany(OrganisationMember::class);
    }

    public function memberImages()
    {
        return $this->hasMany(MemberImage::class);
    }

    public function memberAccount()
    {
        return $this->hasOne(MemberAccount::class);
    }

    public function profilePhoto()
    {
        return $this->hasOne(MemberImage::class)->latest();
    }

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullNameAttribute()
    {
        return $this->middle_name
        ? "{$this->first_name} {$this->middle_name} {$this->last_name}"
        : "{$this->first_name} {$this->last_name}";
    }

    public function getFullNameWithTitleAttribute()
    {
        return $this->middle_name
        ? "{$this->title} {$this->first_name} {$this->middle_name} {$this->last_name}"
        : "{$this->title} {$this->first_name} {$this->last_name}";
    }
}
