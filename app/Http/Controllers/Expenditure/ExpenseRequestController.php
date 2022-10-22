<?php

namespace App\Http\Controllers\Expenditure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expenditure\StoreExpenseRequestRequest;
use App\Http\Requests\Expenditure\UpdateExpenseRequestRequest;
use App\Models\Expenditure\ExpenseRequest;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Expenditure - Expense Requests
 */
class ExpenseRequestController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(ExpenseRequest $expenseRequest) {
        $this->setApiModel($expenseRequest);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Expenditure\StoreExpenseRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequestRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Expenditure\UpdateExpenseRequestRequest  $request
     * @param  \App\Models\Expenditure\ExpenseRequest  $expenseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequestRequest $request, ExpenseRequest $expenseRequest)
    {
        return $this->apiUpdate($request, $expenseRequest->id);
    }

}
