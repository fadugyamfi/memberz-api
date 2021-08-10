<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use LaravelApiBase\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
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
            'first_name' => 'required|min:3|max:30|string',
            'last_name' => 'required|min:3|max:30|string',
            'email' => 'email|required|unique:users',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'mobile_number' => 'required|string|min:6|max:15',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()
            ],
        ];
    }
}
