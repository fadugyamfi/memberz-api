<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use Illuminate\Database\Eloquent\Builder;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationSetting extends ApiModel
{

    use BelongsToTenants, HasCakephpTimestamps;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_settings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_setting_type_id', 'value', 'created', 'modified'];

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
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationSettingType() {
        return $this->belongsTo(OrganisationSettingType::class);
    }

    public function scopeAutoBirthdayMessagingEnabled(Builder $builder): Builder {
        return $builder->where(['organisation_setting_type_id' => 12, 'value' => 1]);
    }

    public function scopeBirthdayMessage(Builder $builder, $organisation_id): string {
        $birthdayMessage =  $builder->where(['organisation_setting_type_id' => 13, 'organisation_id' => $organisation_id])->get();
        if (!$birthdayMessage->value){
            $org = Organisation::where('id', $organisation_id)->first();
            return "{$org->name} wishes you a very happy birthday.";
        }

        return $birthdayMessage->value;
    }
}
