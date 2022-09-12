<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\ExpenseType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenditure - Expense Types
 */
class ExpenseTypeController extends ApiController
{
    public function __construct(ExpenseType $expenseType) {
        parent::__construct($expenseType);
    }
}
