<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationAnniversaryRequest extends ApiRequest
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
            'organisation_id' => 'required|numeric',
            'name' => 'string|required|max:50|min:5',
            'description' => 'nullable|string|max:100|min:5',
            'organisation_member_anniversary_count' => 'nullable|numeric',
            'show_on_reg_forms' => 'nullable|boolean',
            'send_anniversary_message' => 'nullable|boolean',
            'message' => 'nullable|min:5|string',
            'notify_on_anniversary' => 'nullable|boolean',
            'active' => 'nullable|boolean'
        ];
    }
}
