<?php

namespace App\Http\Requests\Expenditure;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiFormRequest;

class StoreExpenseRequestRequest extends FormRequest implements ApiFormRequest
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
            'requested_by_id' => 'nullable|numeric|exists:organisation_members,id',
            'approved_by_id' => 'nullable|numeric|exists:organisation_members,id',
            'voucher_no' => 'nullable|string',
            'request_dt' => 'required|date',
            'amount' => 'required|numeric|min:1',
            'approved_at' => 'nullable|date'
        ];
    }

    public function bodyParameters()
    {
        return [

        ];
    }
}
