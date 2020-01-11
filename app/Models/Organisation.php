<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;


class Organisation extends ApiModel
{

    protected $table = 'organisations';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = [
        'organisation_type_id', 'name', 'slug', 'address', 'city', 'state', 'post_code', 'country_id', 'currency_id',
        'email', 'phone', 'logo', 'website', 'short_description', 'long_description', 'mission', 'cover_photo',
        'member_account_id', 'organisation_member_count', 'organisation_account_count', 'discoverable', 'allow_public_join',
        'default_public_join_category', 'public_directory_enabled', 'locked', 'verified', 'verified_by', 'active', 'trashed'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('notTrashed', function (Builder $builder) {
            $builder->where('trashed', 0)->where('active', 1);
        });
    }

    public function scopeActive($query) {
        $query->where('active', 1);
    }

    public function organisation_type() {
        return $this->belongsTo(OrganisationType::class);
    }

    public function organisation_member() {
        return $this->hasMany(OrganisationMember::class);
    }

    public function organisation_account() {
        return $this->hasMany(OrganisationAccount::class);
    }

    public function organisation_subscription() {
        return $this->hasMany(OrganisationSubscription::class);
    }

    public function active_subscription() {
        return $this->hasOne(OrganisationSubscription::class)->where(['current' => 1]);
    }
}
