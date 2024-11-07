<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelApiBase\Models\ApiModelBehavior;
use Spatie\Tags\HasTags;

class OrganisationBranch extends ApiModel
{
    use HasFactory;
    use HasTags;

    protected $table = 'organisation_branches';

    protected $fillable = [
        'organisation_id',
        'branch_organisation_id',
        'primary_member_id',
        'secondary_member_id',
    ];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function branchOrganisation() {
        return $this->belongsTo(Organisation::class, 'branch_organisation_id');
    }

    public function primaryContact() {
        return $this->belongsTo(Member::class, 'primary_member_id');
    }

    public function secondaryContact() {
        return $this->belongsTo(Member::class, 'secondary_member_id');
    }
}
