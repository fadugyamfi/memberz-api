<?php

namespace App\Http\Requests;

use App\Models\MemberAccount;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use LaravelApiBase\Http\Requests\ApiRequest;

class OrganisationAccountRequest extends ApiRequest
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
        if (! $this->member_account_id) {
            $tempMemberAccount = (new MemberAccount())->createTempAccount(request('member_id'));

            if (!$tempMemberAccount) {
                Log::error("Temporary account not created/available, so not creating organisation account");
                return;
            }

            $this->merge([
                'member_account_id' => (int) $tempMemberAccount->id
            ]);
        }

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
            'member_id' => 'required_without:member_account_id|numeric',
            'member_account_id' => [
                'required_without:member_id',
                'numeric',
                Rule::unique('organisation_accounts')
                    ->ignore($this->id)
                    ->where('organisation_id', $this->organisation_id)
                    ->where('active', 1)
            ],
            'organisation_role_id' => 'required|numeric',
        ];
    }
}
