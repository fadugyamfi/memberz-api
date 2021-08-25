<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use NunoMazer\Samehouse\BelongsToTenants;
class ModuleContributionReceipt extends ApiModel  
{
    use BelongsToTenants, SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_receipts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'receipt_no', 'receipt_dt', 'organisation_account_id', 'created', 'modified', 'active'];

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
    protected $dates = ['receipt_dt', 'created', 'modified'];
    

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisation_account(){
        return $this->belongsTo(OrganisationAccount::class);
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

}
