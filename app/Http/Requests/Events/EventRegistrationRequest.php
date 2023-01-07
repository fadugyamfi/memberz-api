<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class EventRegistrationRequest extends FormRequest
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
            'organisation_event_id' => ['required', 'numeric'],
            'organisation_event_session_id' => ['required', 'numeric'],
            'organisation_member_ids' => ['required_without_all:membership_uuids,member_ids', 'array'],
            'membership_uuids' => ['required_without_all:organisation_member_ids,member_ids', 'array'],
            'member_ids' => ['required_without_all:membership_uuids,organisation_member_ids', 'array']
        ];
    }
}
