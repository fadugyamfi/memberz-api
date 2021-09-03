<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiFormRequest;

class OrganisationMemberGroupRequest extends FormRequest implements ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'organisation_member_id' => 'required|numeric|exists:organisation_members,id',
            'organisation_group_id' => 'required|numeric|exists:organisation_groups,id'
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'organisation_id' => [
                'description' => 'Organisation this record belongs to',
                'example' => 1
            ],
            'organisation_member_id' => [
                'description' => 'Membership this record belongs to',
                'example' => 1
            ],
            'organisation_group_id' => [
                'description' => 'Group this record belongs to',
                'example' => 1
            ]
        ];
    }
}
