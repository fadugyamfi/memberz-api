<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;

class SystemSetting extends ApiModel
{
    use HasCakephpTimestamps;

    const SMS_CREDITS = 'sms_credits';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'system_settings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['setting_type_category_id', 'name', 'type', 'description', 'value', 'created', 'modified'];

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

    public static function deductSmsCredits($credits = 1) {
        $setting = SystemSetting::where('name', self::SMS_CREDITS)->first();

        if( $setting && $setting->value >= $credits ) {
            $setting->value = intval($setting->value) - $credits;
            $setting->save();
        }

        return $setting;
    }
}
