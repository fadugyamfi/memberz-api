<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class ModuleMemberContribution extends ApiModel  
{

    

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

}
