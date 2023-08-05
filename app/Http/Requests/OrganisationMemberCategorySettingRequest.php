<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationMemberCategorySettingRequest extends ApiRequest
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
            'organisation_member_category_id' => ['required', 'numeric'],
            'member_category_setting_id' => ['required', 'numeric'],
            'value' => ['required']
        ];
    }
}
