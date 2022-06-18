<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam first_name string required User First Name. Example: John
 * @bodyParam last_name string required User Last Name. Example: Ansah
 * @bodyParam email string required user Email. Example: john.ansah@mail.com
 * @bodyParam gender string required User Gender. Example: male
 * @bodyParam dob string required User Date of Birth. Example: 1980-01-03
 * @bodyParam mobile_number string required Mobile Number of User. Example: +2332440000001
 * @bodyParam password string required User Password. Example: mypassword01
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
            'last_name' => 'required|min:3|max:50|string',
            'email' => 'email|required|unique:members',
            'gender' => 'nullable|in:male,female',
            'dob' => 'nullable|date',
            'mobile_number' => 'required|string|min:6|max:25|unique:members',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()
            ],
        ];
    }
}
