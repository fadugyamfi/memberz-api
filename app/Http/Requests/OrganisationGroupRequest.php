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
            'organisation_id' => 'required|numeric|exists:organisations,id',
            'organisation_group_type_id' => 'required|numeric|exists:organisation_group_types,id',
            'name' => 'required|string',
            'active' => 'tinyint|nullable',
            'leaders.*.id' => 'sometimes|numeric',
            'leaders.*.name' => 'sometimes|string',
            'leaders.*.role' => 'sometimes|string',
            'leaders.*.organisation_member_id' => 'sometimes|required|numeric|exists:organisation_members,id'
        ];
    }

    public function bodyParameters()
    {
        return  [
            'organisation_id' => [
                'description' => 'The organisation of this group record',
                'example' => 1
            ],
            'organisation_group_type_id' => [
                'description' => 'The group type of this group record',
                'example' => 1
            ],
            'name' => [
                'description' => 'The name of this group record',
                'example' => "Default"
            ],
            'active' => [
                'description' => 'The active state of this group record',
                'example' => 1
            ],
            'leaders.*.id' => [
                'description' => 'The ID of a leader of this group',
                'example' => 1
            ],
            'leaders.*.name' => [
                'description' => 'The name of a leader of this group',
                'example' => "James Ans"
            ],
            'leaders.*.role' => [
                'description' => 'The role of a leader of this group',
                'example' => "President"
            ],
            'leaders.*.organisation_member_id' => [
                'description' => 'The membership ID of a leader of this group',
                'example' => 1
            ],
        ];
    }
}
