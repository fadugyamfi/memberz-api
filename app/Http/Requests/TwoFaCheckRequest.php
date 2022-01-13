<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class TwoFaCheckRequest extends ApiRequest
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
            'code' => 'required|numeric|exists:member_account_codes,code',
        ];
    }
}
