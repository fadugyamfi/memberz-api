<?php

namespace App\Http\Requests\Auth;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam username email required User Email
 * @bodyParam password string required User Password
 */
class LoginRequest extends ApiRequest
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
            'username' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'username' => [
                'description' => 'An email address to login with',
                'example' => 'joe@example.com'
            ],
            'password' => [
                'description' => "User's password for authentication",
                'example' => 'bestpassword',
            ],
        ];
    }
}
