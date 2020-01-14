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
            'organisation_type_id' => 'required|numeric',
            'organisation_group_type_id' => 'required|numeric',
            'name' => 'required|string', 
            'organisation_member_group_count' => 'nullable|integer',
            'created' => 'datetime|nullable',
            'modified' => 'timestamp|nullable',
            'active' => 'tinyint|nullable'
            
        ];
    }
}
