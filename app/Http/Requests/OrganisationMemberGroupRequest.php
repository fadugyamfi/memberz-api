<?php

namespace App\Http\Requests;

use App\Models\OrganisationGroup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // TODO: Add multi-select limitation validation

        return [
            'organisation_id' => 'required|numeric',
            'organisation_member_id' => 'required|numeric|exists:organisation_members,id',
            'organisation_group_id' => [
                'required', 'numeric',
                Rule::exists('organisation_groups', 'id'),
                Rule::unique('organisation_member_groups')
                    ->ignore($this->id)
                    ->where('organisation_member_id', $this->organisation_member_id)
                    ->where('active', 1)
            ]
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
