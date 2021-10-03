<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelApiBase\Http\Requests\ApiFormRequest;
use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationFileImportRequest extends ApiRequest
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
            'organisation_id' => 'required|numeric',
            'import_to_id' => 'required|numeric',
            'import_type' => 'required|in:members,contributions',
            'import_file' => 'required|file|mimes:xls,xlsx'
        ];
    }

    public function bodyParameters()
    {
        return [];
    }
}
