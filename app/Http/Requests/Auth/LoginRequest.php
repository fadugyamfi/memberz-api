<?php

namespace App\Http\Requests\Auth;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam username email required User Email. Example: john@mail.com
 * @bodyParam password string required User Password. Example: mypassword01
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
            'username' => 'required',
            'password' => 'required|string'
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'username' => [
                'description' => 'An email address to login with',
                'example' => 'joe@example.com | 23324095888'
            ],
            'password' => [
                'description' => "User's password for authentication",
                'example' => 'bestpassword',
            ],
        ];
    }
}
