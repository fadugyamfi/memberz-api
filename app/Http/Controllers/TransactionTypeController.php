<?php

namespace App\Http\Controllers;

use App\Models\TransactionType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Transaction Types
 */
class TransactionTypeController extends ApiController
{
    public function __construct(TransactionType $transactionType) {
        parent::__construct($transactionType);
    }
}
