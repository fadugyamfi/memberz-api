<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganisationPaymentPlatformRequest extends FormRequest
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
            'organisation_id' => ['required', 'numeric', Rule::exists('organisations', 'id')],
            'payment_platform_id' => ['required', 'numeric', Rule::exists('payment_platforms', 'id')],
            'currency_id' => ['required', 'numeric'],
            'country_id' => ['required', 'numeric'],
            'config' => ['required'],
            'platform_mode' => ['required', 'string', Rule::in(['live', 'sandbox', 'dev'])],
            'member_registration_instruction' => ['nullable', 'string'],
            'event_registration_instruction' => ['nullable', 'string'],
            'general_instructions' => ['nullable', 'string']
        ];
    }
}
