<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LatestRecordsScope implements Scope {

    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy($model->getTable() . '.' . $model->getCreatedAtColumn(), 'desc');
    }
}
