<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Tags\Tag as TagsTag;

class Tag extends TagsTag implements ApiModelInterface
{
    use HasFactory;
    use BelongsToTenants;
    use ApiModelBehavior;

    protected $fillable = ['organisation_id', 'name', 'slug', 'type', 'order_column'];

    public function organisation(): BelongsTo {
        return $this->belongsTo(Organisation::class);
    }
}
