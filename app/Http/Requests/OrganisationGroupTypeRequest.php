<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationGroupTypeRequest extends ApiRequest
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'active' => 'tinyint|nullable',
        ];
    }

}
