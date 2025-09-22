<?php 

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use LaravelApiBase\Http\Requests\ApiRequest;

class TagRequest extends ApiRequest
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

    public function rules()
    {
        return [
            'organisation_id' => ['required', 'numeric', Rule::exists('organisations', 'id')],
            'name' => ['required', 'string', 'max:255'],
            'type' => [
                'required', 'string', 
                Rule::in(Tag::where('organisation_id', $this->organisation_id)->getTypes()->keys()->toArray())
            ],
        ];
    }
}