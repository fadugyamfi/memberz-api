<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SmsAccountScope implements Scope {

    public function apply(Builder $builder, Model $model)
    {
        $organisation_id = request('organisation_id');

        $builder->join('module_sms_accounts', function($join) use($model, $organisation_id) {
            $join->on('module_sms_accounts.id', '=', "{$model->getTable()}.module_sms_account_id")
                ->where('module_sms_accounts.organisation_id', $organisation_id);
        })->select("{$model->getTable()}.*");
    }
}
