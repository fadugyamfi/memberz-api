<?php

namespace App\Http\Requests;

use App\Models\ContributionReceiptSetting;
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (! $this->organisation_id){
            return;
        }

        $org_receipt_set = ContributionReceiptSetting::organisationReceipt($this->organisation_id)->first();

        if (!$org_receipt_set || ($org_receipt_set && $org_receipt_set->receipt_mode == 'manual')){
            return;
        }

        $this->merge([
            'receipt_no' => $org_receipt_set->prefix.''.++$org_receipt_set->receipt_counter.''.$org_receipt_set->postfix,
            'receipt_dt' => now()
        ]);
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
            'receipt_no' => 'required|string|max:50',
            'receipt_dt' => 'required|date',
            'active' => 'nullable|boolean',
        ];
    }
}
