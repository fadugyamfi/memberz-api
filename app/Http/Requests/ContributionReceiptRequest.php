<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam organisation_id numeric Organisation id
 * @bodyParam organisation_account_id numeric Organisation account id
 * @bodyParam receipt_no string Receipt no
 * @bodyParam receipt_dt date Receipt date
 * @bodyParam active boolean Active
 */
class ContributionReceiptRequest extends ApiRequest
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
            'organisation_id' => 'required|numeric|exists:organisations,id',
            'organisation_account_id' => 'required|numeric|exists:organisation_accounts',
            'receipt_no' => 'nullable|string|max:50',
            'receipt_dt' => 'nullable|date',
            'active' => 'nullable|boolean'
        ];
    }
}
