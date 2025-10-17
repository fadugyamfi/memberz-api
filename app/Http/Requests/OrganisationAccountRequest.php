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
        if( $this->member_account_id ) {
            return;
        }

        // if no member account ID, create a temporary account for the member if possible
        try {
            $tempMemberAccount = (new MemberAccount())->createTempAccount(request('member_id'));

            $this->merge([
                'member_account_id' => (int) $tempMemberAccount->id
            ]);
        } catch (\Exception $e) {
            Log::error("Temporary account not created/available, so not creating organisation account: " . $e->getMessage());
            return;
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
            'organisation_id' => 'required|numeric|exists:organisations,id',
            'member_id' => [
                'required_without:member_account_id',
                'numeric'
            ],
            'member_account_id' => [
                'required_without:member_id',
                'numeric',
                Rule::unique('organisation_accounts')
                    ->ignore($this->id)
                    ->where('organisation_id', $this->organisation_id)
                    ->where('deleted', 0)
            ],
            'organisation_role_id' => 'required|numeric',
        ];
    }
}
