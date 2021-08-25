<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam name string Name
 * @bodyParam method_name string Method name
 * @bodyParam config_keys string Comma separated config keys
 * @bodyParam description string Description
 * @bodyParam logo string Description
 * @bodyParam instructions string Description
 * @bodyParam deleted boolean Deleted
 */
class PaymentPlatformRequest extends ApiRequest
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
            'name' => 'nullable|string|max:100',
            'method_name' => 'nullable|string|max:30',
            'config_keys' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:150',
            'logo' => 'nullable|string',
            'instructions' => 'nullable|string',
            'deleted' => 'nullable|boolean'
        ];
    }
}
