<?php

namespace App\Models\Expenditure;

use App\Models\ApiModel;

class Account extends ApiModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_accounts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'name', 'description', 'account_type', 'bank_id', 'amount', 'currency_id', 'created', 'modified', 'deleted'];

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
    protected $dates = ['created', 'modified'];

}
