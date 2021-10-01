<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use Spatie\Activitylog\LogOptions;

class Member extends ApiModel
{

    use SoftDeletesWithActiveFlag, LogModelActivity;

    protected $table = 'members';

    protected $primaryKey = 'id';

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

    public function getNameAttribute()
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

    public function getActivitylogOptions(): LogOptions
    {
        $member = $this;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("member_profile")
            ->setDescriptionForEvent(function($eventName) use($member) {
                if( $eventName == 'created' ) {
                    return __('Added member profile for ":name"', [
                        'name' => $member->name
                    ]);
                }

                if( $eventName == 'updated' ) {
                    return __('Updated member profile for ":name"', [
                        'name' => $member->name
                    ]);
                }

                if( $eventName == 'deleted' ) {
                    return __('Deleted member profile for ":name"', [
                        'name' => $member->name
                    ]);
                }
            });
    }
}
