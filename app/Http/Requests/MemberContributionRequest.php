<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam organisation_id numeric Organisation id
 * @bodyParam organisation_member_id numeric Organisation Member id
 * @bodyParam module_contribution_type_id numeric Module contribution type id
 * @bodyParam module_contribution_receipt_id numeric Module contribution receipt id
 * @bodyParam module_contribution_payment_type_id numeric Module contribution payment type id
 * @bodyParam bank_id numeric Bank id
 * @bodyParam currency_id numeric Currency id
 * @bodyParam organisation_file_import_id numeric Organisation file import id
 * @bodyParam description string Description
 * @bodyParam week numeric Week
 * @bodyParam month numeric month
 * @bodyParam year numeric year
 * @bodyParam cheque_status enum 'Cleared|Not Cleared'
 * @bodyParam cheque_number string Cheque Number
 * @bodyParam amount numeric Amount
 * @bodyParam active boolean Active
 * @bodyParam receipt_no string required Receipt no
 * @bodyParam receipt_dt date required  Receipt date
 */
class MemberContributionRequest extends ApiRequest
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
            'module_contribution_type_id' => 'nullable|numeric|exists:module_contribution_types,id',
            'module_contribution_receipt_id' => 'nullable|numeric|exists:module_contribution_receipts,id',
            'module_contribution_payment_type_id' => 'nullable|numeric|exists:module_contribution_payment_types,id',
            'bank_id' => 'nullable|numeric|exists:banks,id',
            'currency_id' => 'required|numeric|exists:currencies,id',
            'organisation_file_import_id' => 'nullable|numeric|exists:organisation_file_imports,id',
            'description' => 'nullable|string|max:150',
            'week' => 'nullable|numeric',
            'month' => 'nullable|numeric',
            'year' => 'nullable|numeric',
            'cheque_status' => 'nullable|in:Cleared, Not Cleared',
            'cheque_number' => 'nullable|string|max:11',
            'amount' => 'required|numeric',
            'receipt_no' => 'required|string|max:50',
            'receipt_dt' => 'required|date',
            'active' => 'nullable|boolean'
        ];
    }
}
