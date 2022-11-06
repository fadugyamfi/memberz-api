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
            'organisation_member_id' => ['required_without_all:membership_uuid,member_id', 'numeric'],
            'membership_uuid' => ['required_without_all:organisation_member_id,member_id', 'uuid'],
            'member_id' => ['required_without_all:membership_uuid,organisation_member_id', 'numeric', 'exists:members,id']
        ];
    }
}
