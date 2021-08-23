<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam first_name string required User First Name
 * @bodyParam last_name string required User Last Name
 * @bodyParam email string required user Email
 * @bodyParam gender string required User Gender
 * @bodyParam dob string required User Date of Birth
 * @bodyParam mobile_number string required Mobile Number of User
 * @bodyParam password string required User Password
 */
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
            'email' => 'email|required|unique:members',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'mobile_number' => 'required|string|min:6|max:25|unique:members',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()
            ],
        ];
    }
}
