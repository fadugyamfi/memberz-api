<?php

namespace App\Http\Requests;

use App\Models\Member;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganisationMemberRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'organisation_id' => ['required', 'numeric'],
            'organisation_no' => ['nullable', 'string'],
            'member_id' => [
                'required_without_all:first_name,last_name,mobile_number,gender',
                'nullable',
                Rule::unique('organisation_members', 'member_id')->where('organisation_id', $this->organisation_id)
            ],
            'organisation_member_category_id' => ['required', Rule::exists('organisation_member_categories', 'id')],
            'first_name' => ['required_without:member_id', 'string'],
            'last_name' => ['required_without:member_id', 'string'],
            'mobile_number' => ['required_without:member_id', 'string'],
            'gender' => ['string', 'required_without:member_id', 'in:male,female'],
            'dob' => ['date'],
            'email' => ['email', 'nullable']
        ];
    }

    public function messages() {
        return [
            'member_id.unique' => 'A membership for this organisation already exists'
        ];
    }
}
