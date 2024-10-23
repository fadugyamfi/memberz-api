<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationBranch extends Model
{
    use HasFactory;

    protected $table = 'organisation_branches';

    protected $fillable = [
        'organisation_id',
        'name',
        'email',
        'phone',
        'address',
        
    ];
}
