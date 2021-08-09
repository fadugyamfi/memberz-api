<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Banks
 */
class BankController extends ApiController
{
    public function __construct(Bank $bank) {
        parent::__construct($bank);
    }
}
