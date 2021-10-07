<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'module_sms_account_id' => 'required|numeric|exists:module_sms_accounts,id',
            'member_id' => ['required', 'numeric', 'exists:members,id'],
            'to' => ['required'],
            'message' => ['required', 'string'],
            'sent_by' => ['sometimes', 'numeric', Rule::exists('member_accounts', 'id')]
        ];
    }
}
