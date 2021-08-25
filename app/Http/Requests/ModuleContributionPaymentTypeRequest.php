<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam name string Name
 * @bodyParam payment_platform_id numeric Payment Platform id
 * @bodyParam active boolean Active
 */
class ModuleContributionPaymentTypeRequest extends ApiRequest
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
            'payment_platform_id' => 'nullable|numeric|exists:payment_platforms,id',
            'name' => 'nullable|string',
            'active' => 'nullable|boolean'
        ];
    }
}
