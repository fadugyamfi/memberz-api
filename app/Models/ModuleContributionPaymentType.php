<?php

namespace App\Models;

class ModuleContributionPaymentType extends ApiModel  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_contribution_payment_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'payment_platform_id', 'active'];

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

    public function payment_platform(){
        return $this->belongsTo(PaymentPlatform::class);
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

}
