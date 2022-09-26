<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class EventSessionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'organisation_id' => ['required', 'numeric'],
            'organisation_event_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'session_dt' => ['required', 'date'],
            'session_name' => ['required', 'string'],
            'registration_code' => ['string', 'nullable']
        ];
    }
}
