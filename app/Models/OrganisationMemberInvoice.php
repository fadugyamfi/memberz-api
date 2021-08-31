<?php

namespace App\GenModels;

use Illuminate\Database\Eloquent\Model;

class OrganisationMemberInvoice extends ApiModel  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_invoices';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'transaction_type_id', 'invoice_no', 'paid', 'currency_id', 'total_due', 'due_date', 'notes', 'created', 'modified', 'deleted', 'deleted_by'];

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
    protected $casts = ['paid' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['due_date', 'created', 'modified'];

}
