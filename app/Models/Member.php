<?php

namespace App\Models;



class Member extends ApiModel
{

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['title', 'first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile_number', 'email', 'website', 'occupation', 'profession', 'business_name', 'active'];

    public function organisation_member() {
        return $this->hasMany(OrganisationMember::class);
    }

    public function member_image() {
        return $this->hasMany(MemberImage::class);
    }

    public function member_account() {
        return $this->hasOne(MemberAccount::class);
    }

    public function profile_photo() {
        return $this->hasOne(MemberImage::class)->latest();
    }

    public function name() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
