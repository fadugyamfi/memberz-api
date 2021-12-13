<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationRegistrationFormRequest extends ApiRequest
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
            'organisation_id' => 'required|numeric|exists:organisations,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'expiration_dt' => 'nullable|date',
            'excluded_standard_fields' => 'nullable|string',
            'custom_fields' => 'nullable|json',
            'form_enabled' => 'nullable|boolean',
            'deleted_at' => 'nullable|date'
        ];
    }
}
