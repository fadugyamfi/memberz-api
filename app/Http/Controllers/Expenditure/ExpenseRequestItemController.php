<?php

namespace App\Http\Controllers\Expenditure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expenditure\StoreExpenseRequestItemRequest;
use App\Http\Requests\Expenditure\UpdateExpenseRequestItemRequest;
use App\Models\Expenditure\ExpenseRequestItem;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Expenditure - Expense Request Items
 */
class ExpenseRequestItemController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(ExpenseRequestItem $expenseRequest) {
        $this->setApiModel($expenseRequest);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Expenditure\StoreExpenseRequestItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequestItemRequest $request)
    {
        return $this->apiStore($request);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Expenditure\UpdateExpenseRequestItemRequest  $request
     * @param  \App\Models\Expenditure\ExpenseRequestItem  $expenseRequestItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequestItemRequest $request, ExpenseRequestItem $expenseRequestItem)
    {
        return $this->apiUpdate($request, $expenseRequestItem->id);
    }

}
