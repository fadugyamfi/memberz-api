<?php

namespace App\Models\Expenditure;

use App\Models\ApiModel;
use App\Traits\LogModelActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NunoMazer\Samehouse\BelongsToTenants;

class ExpenseRequestItem extends ApiModel
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToTenants;
    use LogModelActivity;
}
