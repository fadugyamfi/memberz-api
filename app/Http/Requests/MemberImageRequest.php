<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberImageRequest extends FormRequest
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
            'member_id' => ['required', 'numeric', 'exists:members,id'],
            'image' => ['sometimes', 'required', 'file', 'mimes:png,jpg', 'max:5000'],
            'image_base64' => ['sometimes', 'required']
        ];
    }
}
