<?php

namespace App\Models;

use App\Observers\OrganisationBranchObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LaravelApiBase\Models\ApiModelBehavior;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Tags\HasTags;

#[ObservedBy(OrganisationBranchObserver::class)]
class OrganisationBranch extends ApiModel
{
    use HasFactory;
    use HasTags;
    use BelongsToTenants;

    protected $table = 'organisation_branches';

    protected $fillable = [
        'organisation_id',
        'branch_organisation_id',
        'primary_member_id',
        'secondary_member_id',
    ];

    public function organisation(): BelongsTo {
        return $this->belongsTo(Organisation::class);
    }

    public function branch(): BelongsTo {
        return $this->belongsTo(Organisation::class, 'branch_organisation_id');
    }

    public function primaryContact(): BelongsTo {
        return $this->belongsTo(Member::class, 'primary_member_id');
    }

    public function secondaryContact(): BelongsTo {
        return $this->belongsTo(Member::class, 'secondary_member_id');
    }
}
