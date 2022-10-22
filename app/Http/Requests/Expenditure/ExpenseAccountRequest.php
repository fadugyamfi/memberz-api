<?php

namespace App\Http\Requests\Expenditure;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseAccountRequest extends FormRequest
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
            'currency_id' => 'required|numeric|exists:currencies,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'account_type' => 'required|string|in:Cash,Current,Savings,Investment',
            'bank_id' => 'required|numeric|exists:banks,id',
            'amount' => 'nullable|numeric'
        ];
    }
}
