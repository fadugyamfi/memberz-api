<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam contribution_type_id numeric Contribution Type Report. Example 1
 * @bodyParam year numeric required Year. Example 2021
 * @bodyParam month numeric Month. Example 2
 */
class ContributionSummaryReportRequest extends ApiRequest
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
            'contribution_type_id' => 'required|numeric|exists:module_contribution_types,id',
            'year' => 'required|numeric',
            'month' => 'nullable|numeric',
        ];
    }
}
