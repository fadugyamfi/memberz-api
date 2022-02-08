<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use NunoMazer\Samehouse\BelongsToTenants;

class ContributionType extends ApiModel
{
    use BelongsToTenants, SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'member_required', 'fix_amount_per_period', 'currency_id', 'fixed_amount', 'system_generated', 'active'];

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
    protected $casts = ['fix_amount_per_period' => 'boolean', 'system_generated' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function contribution() {
        return $this->hasMany(Contribution::class, 'module_contribution_type_id');
    }

}
