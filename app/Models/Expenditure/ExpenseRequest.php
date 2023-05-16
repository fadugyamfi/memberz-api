<?php

namespace App\Models\Expenditure;

use App\Models\{ApiModel, Currency, Organisation, OrganisationMember};
use App\Traits\LogModelActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NunoMazer\Samehouse\BelongsToTenants;

class ExpenseRequest extends ApiModel
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToTenants;
    use LogModelActivity;


    protected $fillable = [
        'organisation_id',
        'voucher_no',
        'request_dt',
        'currency_id',
        'amount',
        'requested_by_id',
        'approved_by_id',
        'approved_at'
    ];

    protected $casts = [
        'request_dt' => 'date',
        'approved_at' => 'date'
    ];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function requester() {
        return $this->belongsTo(OrganisationMember::class, 'requested_by_id');
    }

    public function approver() {
        return $this->belongsTo(OrganisationMember::class, 'approved_by_id');
    }
}
