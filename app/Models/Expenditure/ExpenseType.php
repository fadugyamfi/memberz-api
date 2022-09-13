<?php

namespace App\Models\Expenditure;

use Spatie\Activitylog\LogOptions;
use App\Models\{ApiModel, Organisation};
use NunoMazer\Samehouse\BelongsToTenants;
use App\Traits\SoftDeletesWithDeletedFlag;
class ExpenseType extends ApiModel
{
    use BelongsToTenants;
    use SoftDeletesWithDeletedFlag;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_expense_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'member_required', 'active'];

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
    protected $casts = ['active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];


    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $expenseType = $this;

        return LogOptions::defaults()
            ->useLogName('expenditure')
            ->logAll()
            ->setDescriptionForEvent(function ($eventName) use ($expenseType) {
                $params = [
                    'name' => $expenseType->name
                ];

                if ($eventName == 'created') {
                    return __("Created expense type ':name'", $params);
                }

                if ($eventName == 'updated') {
                    return __("Updated expense type ':name'", $params);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted expense type ':name'", $params);
                }
            });
    }

}
