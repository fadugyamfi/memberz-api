<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationRequest extends ApiRequest
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
            'organisation_type_id' => 'required|numeric|exists:organisation_types,id',
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'website' => 'nullable|url',
            'country_id' => 'required|numeric',
            'currency_id' => 'nullable|numeric',
            'logo' => 'nullable|url',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'post_code' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
        ];
    }
}
