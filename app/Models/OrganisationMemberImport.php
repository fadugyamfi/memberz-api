<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationMemberImport extends Model implements ApiModelInterface
{
    use HasFactory, BelongsToTenants, ApiModelBehavior;

    protected $fillable = ['organisation_id', 'member_id', 'organisation_file_import_id', 'import_type'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function organisationFileImport() {
        return $this->belongsTo(OrganisationFileImport::class);
    }
}
