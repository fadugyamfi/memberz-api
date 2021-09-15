<?php

namespace App\Observers;

use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationRole;
use App\Notifications\MemberMadeAdmin;
use App\Notifications\OrganisationAdminRoleChanged;
use Illuminate\Support\Facades\Log;

class OrganisationAccountObserver
{

    /**
     * Handle the organisation account "creating" event.
     *
     * @param  \App\Models\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function creating(OrganisationAccount $organisationAccount)
    {
        if ($organisationAccount->member_account_id) {
            return;
        }

        $tempMemberAccount = MemberAccount::createTempAccount(request('member_id'));

        if (!$tempMemberAccount) {
            Log::error("Temporary account not created/available, so not creating organisation account");
            return;
        }

        $organisationAccount->member_account_id = $tempMemberAccount->id;
    }

    /**
     * Handle the organisation Account "updating" event.
     *
     * @param  \App\OrganisationAccount  $organisationAccount
     * @return void
     */
    public function updating(OrganisationAccount $organisationAccount)
    {
        /** Changing member role from admin */
        if ($organisationAccount->isDirty('organisation_role_id') && $this->isAdminRole($organisationAccount->getOriginal('organisation_role_id'))) {
            $this->sendAdminUserRoleChangedNotification($organisationAccount);
        }

        /** Giving user admin role */
        if ($organisationAccount->isDirty('organisation_role_id') && 
        !$this->isAdminRole($organisationAccount->getOriginal('organisation_role_id')) && $this->isAdminRole($organisationAccount->organisation_role_id)) {
            $this->sendMemberMadeAdminNotification($organisationAccount);
        }
    }

    private function sendMemberMadeAdminNotification(OrganisationAccount $organisationAccount) : void {
        $member_account = MemberAccount::find($organisationAccount->member_account_id);
        $member_account->notify(new MemberMadeAdmin($organisationAccount->organisation_role_id, $organisationAccount->organisation_id));
    }

    private function sendAdminUserRoleChangedNotification(OrganisationAccount $organisationAccount) : void 
    {
        $member_account = MemberAccount::find($organisationAccount->member_account_id);
        $member_account->notify(new OrganisationAdminRoleChanged($organisationAccount->organisation_role_id, $organisationAccount->organisation_id));
    }

    private function isAdminRole(int $organisation_role_id): bool
    {
        return $organisation_role_id == OrganisationRole::whereName('Administrator')->first()->id;
    }
}
