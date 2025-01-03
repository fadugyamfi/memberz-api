<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam organisation_id numeric required Organisation id
 * @bodyParam receipt_mode string required 'auto|manual'
 * @bodyParam receipt_prefix string
 * @bodyParam receipt_postfix string
 * @bodyParam receipt_counter numeric
 * @bodyParam default_currency numeric default currency id
 * @bodyParam sms_notify boolean
 */
class ContributionReceiptSettingRequest extends ApiRequest
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
            'organisation_id' => [
                'required', 'numeric', 'exists:organisations,id',
                // temporarily disable due to bad data. Re-enable after fixing excess duplicated data
                //  Rule::unique('module_contribution_receipt_settings', 'organisation_id')->ignore($this->id)
            ],
            'receipt_mode' => 'required|string|in:auto,manual',
            'receipt_prefix' => 'nullable|string|max:30',
            'receipt_postfix' => 'nullable|string|max:30',
            'receipt_counter' => 'required|numeric',
            'default_currency' => 'nullable|numeric|exists:currencies,id',
            'sms_notify' => 'nullable|boolean'
        ];
    }
}
