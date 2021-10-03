<?php

namespace App\Http\Requests\Auth;

use LaravelApiBase\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Password;

/**
 * @bodyParam username string required User email. Example: john@mail.com
 * @bodyParam token string required Password Reset Token. Example: 123010100101
 * @bodyParam password string required New User Password. Example: mypassword02
 */
class ResetPasswordRequest extends ApiRequest
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
            'username' => 'email|required',
            'token' => 'required',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()
            ],
        ];
    }
}
