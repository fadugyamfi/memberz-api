<?php

namespace App\Models\Expenditure;

use App\Models\ApiModel;

class Expense extends ApiModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_expenses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'expense_type_id', 'payment_voucher_id', 'organisation_member_id', 'description', 'account_id', 'cheque_number', 'amount', 'currency_id', 'organisation_file_import_id', 'created', 'modified', 'active'];

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
