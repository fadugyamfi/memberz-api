<?php

namespace App\Scopes;

use App\Models\Organisation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class InActiveOrganisationScope implements Scope {

    public function apply(Builder $builder, Model $model)
    {
        $builder->whereIn($model->qualifyColumn('organisation_id'), Organisation::pluck('id'));
    }
}
