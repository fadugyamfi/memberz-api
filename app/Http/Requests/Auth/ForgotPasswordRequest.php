<?php

namespace App\Http\Requests\Auth;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam username email required The email for the password reset link
 */
class ForgotPasswordRequest extends ApiRequest
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
            'username' => 'email|required'
        ];
    }
}
