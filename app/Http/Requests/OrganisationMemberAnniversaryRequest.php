<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationMemberAnniversaryRequest extends ApiRequest
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
            'organisation_member_id' => 'required|numeric|exists:organisation_members,id',
            'organisation_anniversary_id' => 'required|numeric|exists:organisation_anniversaries,id',
            'value' => 'nullable|date',
            'active' => 'nullable|boolean',
            'note' => 'nullable'
        ];
    }
}
