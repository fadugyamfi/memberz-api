<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam name string Name
 * @bodyParam organisation_id numeric required Organisation id
 * @bodyParam member_required string 'Required|Non Required'
 * @bodyParam description string Description
 * @bodyParam fix_amount_per_period boolean Fix amount per period
 * @bodyParam currency_id numeric City id
 * @bodyParam fixed_amount numeric Fixed Amount
 * @bodyParam system_generated boolean System Generated
 * @bodyParam active boolean Active
 */
class ModuleContributionTypeRequest extends ApiRequest
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
            'organisation_id' => 'required|numeric',
            'name' => 'nullable|string|max:50',
            'member_required' => 'nullable|in:Required, Not Required',
            'description' => 'nullable|string|max:200',
            'fix_amount_per_period' => 'nullable|boolean',
            'currency_id' => 'nullable|numeric|exits:currencies,id',
            'fixed_amount' => 'nullable|numeric',
            'system_generated' => 'nullable|boolean',
            'active' => 'nullable|boolean'
        ];
    }
}
