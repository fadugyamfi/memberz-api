<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Member extends ApiModel
{

    use HasCakephpTimestamps, LogModelActivity; // SoftDeletesWithActiveFlag,

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile_number', 'email', 'website', 'occupation', 'profession', 'business_name', 'active',
        'nationality', 'place_of_birth', 'address'
    ];

    protected $appends = ['full_name', 'full_name_with_title', 'age'];

    protected $casts = [
        'dob' => 'datetime:Y-m-d'
    ];

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

    public function name(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
        );
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

    public function getAgeAttribute() {
        return $this->dob ? now()->diff($this->dob)->y : null;
    }

    public function scopeActive(Builder $builder) : Builder {
        return $builder->where('active', 1);
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
