<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationSubscriptionRequest extends ApiRequest
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
            'subscription_type_id' => 'required|numeric',
            'organisation_invoice_id' => 'numeric',
            'length' => 'numeric|nullable',
            'current' => 'in:0,1|nullable',
            'start_dt' => 'datetime|nullable',
            'end_dt' => 'datetime|nullable'
        ];
    }
}