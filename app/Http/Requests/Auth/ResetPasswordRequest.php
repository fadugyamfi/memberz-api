<?php

namespace App\Http\Requests\Auth;

use LaravelApiBase\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Password;

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
