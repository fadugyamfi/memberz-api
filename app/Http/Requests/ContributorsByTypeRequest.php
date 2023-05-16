<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class ContributorsByTypeRequest extends ApiRequest
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
            'year' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'currency_id' => 'required|numeric|exists:currencies,id',
            'contribution_type_id' => 'required|numeric|exists:module_contribution_types,id'
        ];
    }
}
