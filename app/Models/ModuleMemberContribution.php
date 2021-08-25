<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use NunoMazer\Samehouse\BelongsToTenants;

class ModuleMemberContribution extends ApiModel  
{
    use BelongsToTenants, SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_member_contributions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'module_contribution_type_id', 'module_contribution_receipt_id', 'description', 'week', 'month', 'year', 'module_contribution_payment_type_id', 'cheque_status', 'cheque_number', 'bank_id', 'amount', 'currency_id', 'organisation_file_import_id', 'created', 'modified', 'active'];

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
    protected $dates = ['created', 'modified'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisation_member(){
        return $this->belongsTo(OrganisationMember::class);
    }

    public function contribution_type(){
        return $this->belongsTo(ModuleContributionType::class);
    }

    public function organisation_file_import(){
        return $this->belongsTo(OrganisationFileImport::class);
    }

    public function contribution_receipt(){
        return $this->belongsTo(ModuleContributionReceipt::class);
    }

    public function bank(){
        return $this->belongsTo(Bank::class);
    }

    public function contribution_payment_type(){
        return;
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

}
