<?php

namespace App\Http\Requests\Expenditure;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseAccountBalanceRequest extends FormRequest
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
            'organisation_id' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'module_contribution_account_id' => 'required|numeric',
            'balance' => 'required|numeric',
            'balance_dt' => 'required|date',
            'member_account_id' => 'required|numeric'
        ];
    }
}
