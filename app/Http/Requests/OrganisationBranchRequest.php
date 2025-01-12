<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationBranchRequest extends ApiRequest
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
            'branch_organisation_id' => [
                'required', 'numeric',
                Rule::exists('organisations', 'id'),
                Rule::unique('organisation_branches', 'branch_organisation_id')
                    ->where('organisation_id', $this->organisation_id)
                    ->ignore($this->id)
            ],
            'primary_member_id' => 'nullable|numeric|exists:members,id',
            'secondary_member_id' => 'nullable|numeric|exists:members,id',
            'tags' => ['array', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'branch_organisation_id.unique' => __('Branch already associated with this organisation')
        ];
    }

    public function bodyParameters()
    {
        return  [
            'organisation_id' => [
                'description' => 'The parent organisation of this relationship',
                'example' => 1
            ],
            'branch_organisation_id' => [
                'description' => 'The branch organisation of this relationship',
                'example' => 2
            ],
            'primary_member_id' => [
                'description' => 'The primary contact person in this organisation',
                'example' => 1234
            ],
            'secondary_member_id' => [
                'description' => 'The secondary contact person in this organisation',
                'example' => 1444
            ],
        ];
    }
}
