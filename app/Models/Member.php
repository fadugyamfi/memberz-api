<?php

namespace App\Models;



class Member extends ApiModel
{

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['title', 'first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile_number', 'email', 'website', 'occupation', 'profession', 'business_name', 'active'];

    public function organisationMember() {
        return $this->hasMany(OrganisationMember::class);
    }

    public function memberImage() {
        return $this->hasMany(MemberImage::class);
    }

    public function memberAccount() {
        return $this->hasOne(MemberAccount::class);
    }

    public function profilePhoto() {
        return $this->hasOne(MemberImage::class)->latest();
    }

    public function name() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
