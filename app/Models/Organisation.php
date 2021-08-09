<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


class Organisation extends ApiModel
{

    protected $table = 'organisations';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = [
        'organisation_type_id', 'name', 'slug', 'uuid', 'address', 'city', 'state', 'post_code', 'country_id', 'currency_id',
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
            $builder->where('organisations.trashed', 0)->where('organisations.active', 1);
        });
    }

    public function scopeActive($query) {
        $query->where('active', 1);
    }

    public function organisationType() {
        return $this->belongsTo(OrganisationType::class);
    }

    public function organisationMembers() {
        return $this->hasMany(OrganisationMember::class);
    }

    public function organisationAccounts() {
        return $this->hasMany(OrganisationAccount::class);
    }

    public function organisationSubscriptions() {
        return $this->hasMany(OrganisationSubscription::class);
    }

    public function activeSubscription() {
        return $this->hasOne(OrganisationSubscription::class)->where(['current' => 1]);
    }

    public function generateSlug($force = false) {
        if( $this->slug && !$force ) {
            return;
        }

        $this->slug = Str::slug($this->name) . '-' . rand(10000,99999);
    }
}
