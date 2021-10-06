<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationGroupRequest extends ApiRequest
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
            'organisation_type_id' => 'required|numeric|exists:organisations,id',
            'organisation_group_type_id' => 'required|numeric|exists:organisation_group_types,id',
            'name' => 'required|string',
            'active' => 'tinyint|nullable'

        ];
    }

    public function bodyParameters()
    {
        return  [
            'organisation_type_id' => [
                'description' => 'The group type of this group record',
                'example' => 1
            ]
        ];
    }
}
