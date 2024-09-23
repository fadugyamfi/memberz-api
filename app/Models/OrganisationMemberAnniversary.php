<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationMemberAnniversary extends ApiModel
{
    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_anniversaries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'organisation_anniversary_id', 'value', 'note', 'created', 'modified', 'active'];

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
    protected $casts = ['value' => 'date'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['value', 'created', 'modified'];

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationMember() {
        return $this->belongsTo(OrganisationMember::class);
    }

    public function organisationAnniversary(){
        return $this->belongsTo(OrganisationAnniversary::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $memAnniv = $this;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("organisation_anniversary")
            ->setDescriptionForEvent(function($eventName) use($memAnniv) {
                if( $eventName == 'created' ) {
                    return __('Assigned ":anniv" to ":member" in ":org"', [
                        'anniv' => $memAnniv->organisationAnniversary->name,
                        'member' => $memAnniv->organisationMember->member->name,
                        'org' => $memAnniv->organisation->name
                    ]);
                }

                if ($eventName == 'updated') {
                    return __('Updated ":anniv" assigned to ":member" in ":org"', [
                        'anniv' => $memAnniv->organisationAnniversary->name,
                        'member' => $memAnniv->organisationMember->member->name,
                        'org' => $memAnniv->organisation->name
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __('Deleted ":anniv" assigned to ":member" in ":org"', [
                        'anniv' => $memAnniv->organisationAnniversary->name,
                        'member' => $memAnniv->organisationMember->member->name,
                        'org' => $memAnniv->organisation->name
                    ]);
                }

            });
    }

}
