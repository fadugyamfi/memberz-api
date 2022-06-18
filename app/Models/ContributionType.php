<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class ContributionType extends ApiModel
{
    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        $type = $this;

        return LogOptions::defaults()
            ->useLogName('finance')
            ->logAll()
            ->setDescriptionForEvent(function($eventName) use($type) {
                $params = [
                    'type_name' => $type->name
                ];

                if( $eventName == 'created' ) {
                    return __("Created contribution type ':type_name' ", $params);
                }

                if( $eventName == 'updated' ) {
                    return __("Updated contribution type ':type_name' ", $params);
                }

                if( $eventName == 'deleted' ) {
                    return __("Deleted contribution type ':type_name' ", $params);
                }
            });
    }
}
