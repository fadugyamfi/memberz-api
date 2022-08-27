<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\Expense;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenses
 */
class ExpenseController extends ApiController
{
    public function __construct(Expense $expense) {
        parent::__construct($expense);
    }
}
