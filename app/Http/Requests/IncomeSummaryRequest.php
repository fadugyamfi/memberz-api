<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class IncomeSummaryRequest extends ApiRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'currency_id' => 'required|numeric|exists:currencies,id'
        ];
    }
}
