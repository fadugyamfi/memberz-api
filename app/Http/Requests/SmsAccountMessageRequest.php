<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class SmsAccountMessageRequest extends FormRequest
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
            'module_sms_account_id' => 'required|numeric',
            'member_id' => ['required', 'numeric'],
            'to' => ['required'],
            'message' => ['required', 'string'],
            'sent_by' => ['sometimes', 'numeric', Rule::exists('member_accounts', 'id')]
        ];
    }
}
