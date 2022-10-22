<?php

namespace App\Http\Requests\Expenditure;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiFormRequest;

class UpdateExpenseRequestItemRequest extends FormRequest implements ApiFormRequest
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
            //
        ];
    }

    public function bodyParameters()
    {
        return [

        ];
    }
}
