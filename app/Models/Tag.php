<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Tags\Tag as TagsTag;

class Tag extends TagsTag
{
    use HasFactory;
    use BelongsToTenants;

    protected $fillable = ['organisation_id', 'name', 'slug', 'type', 'order_column'];
}
