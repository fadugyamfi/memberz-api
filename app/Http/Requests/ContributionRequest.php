<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam organisation_id numeric Organisation id. Example: 1
 * @bodyParam organisation_member_id numeric Organisation Member id. Example: 1234
 * @bodyParam module_contribution_type_id numeric Module contribution type id. Example: 1
 * @bodyParam module_contribution_receipt_id numeric Module contribution receipt id. Example: 12
 * @bodyParam module_contribution_payment_type_id numeric Module contribution payment type id. Example: 1
 * @bodyParam bank_id numeric Bank id. Example: 123
 * @bodyParam currency_id numeric Currency id. Example: 15
 * @bodyParam organisation_file_import_id numeric Organisation file import id. Example: 145
 * @bodyParam description string Description. Example: Monthly payment
 * @bodyParam week numeric Week. Example: 1
 * @bodyParam month numeric month. Example: 11
 * @bodyParam year numeric year. Example: 2020
 * @bodyParam cheque_status enum 'Cleared|Not Cleared'. Example: Cleared
 * @bodyParam cheque_number string Cheque Number. Example: 001010
 * @bodyParam amount numeric Amount. Example: 80
 * @bodyParam active boolean Active: Example: true
 * @bodyParam receipt_no string required Receipt no. Example: 010010
 * @bodyParam receipt_dt date required  Receipt date. Example: 2020-01-01
 */
class ContributionRequest extends ApiRequest
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
            'organisation_member_id' => 'nullable|numeric|exists:organisation_members,id',
            'module_contribution_type_id' => 'required|numeric|exists:module_contribution_types,id',
            'module_contribution_receipt_id' => 'nullable|numeric|exists:module_contribution_receipts,id',
            'module_contribution_payment_type_id' => 'required|numeric|exists:module_contribution_payment_types,id',
            'bank_id' => 'nullable|numeric|exists:banks,id',
            'currency_id' => 'required|numeric|exists:currencies,id',
            'organisation_file_import_id' => 'nullable|numeric|exists:organisation_file_imports,id',
            'description' => 'nullable|string|max:150',
            'week' => 'nullable|numeric',
            'month' => 'nullable|numeric',
            'year' => 'nullable|numeric',
            'cheque_status' => 'nullable|in:Cleared,Not Cleared',
            'cheque_number' => 'nullable|string|max:11',
            'amount' => 'required|numeric',
            'receipt_no' => 'nullable|string|max:50',
            'receipt_dt' => 'nullable|date',
            'active' => 'nullable|boolean',
            'send_sms' => 'required|boolean'
        ];
    }
}
