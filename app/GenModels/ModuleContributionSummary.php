<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class ModuleContributionSummary extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_summaries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'receipt_dt', 'module_contribution_type_id', 'week', 'month', 'year', 'currency_id', 'amount', 'created', 'modified', 'deleted'];

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
    protected $dates = ['receipt_dt', 'created', 'modified'];

}
