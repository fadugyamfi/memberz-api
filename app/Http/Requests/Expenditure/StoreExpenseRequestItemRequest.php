<?php

namespace App\Http\Requests\Expenditure;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiFormRequest;

class StoreExpenseRequestItemRequest extends FormRequest implements ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'organisation_id' => 'required|numeric|exists:organisations,id',
            'expense_request_id' => 'nullable|numeric|exists:expense_requests,id',
            'currency_id' => 'required|numeric|exists:currencies,id',
            'quantity' => 'required|numeric',
            'unit_price' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:1',
            'description' => 'nullable|string'
        ];
    }

    public function bodyParameters()
    {
        return [

        ];
    }
}
