<?php

namespace App\Models\Support;

use App\Models\ApiModel;

class SupportModel extends ApiModel {

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $connection = 'support_mysql';
}
