<?php

namespace App\Models\Expenditure;

use App\Models\ApiModel;
use Illuminate\Database\Eloquent\Model;

class AccountBalance extends ApiModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_account_balances';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'module_contribution_account_id', 'balance', 'balance_dt', 'member_account_id', 'created', 'modified', 'deleted'];

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
    protected $casts = ['deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['balance_dt', 'created', 'modified'];

}
