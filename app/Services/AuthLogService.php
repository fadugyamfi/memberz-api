<?php

namespace App\Services;

use App\Models\MemberAccount;

class AuthLogService {

    public function logLogout(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('logout')
            ->log(__("User \":account_name\" logged out", ['account_name' => $account->member->name]));
    }

    public function logLoginSuccess(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('login')
            ->log(__("User login by :account_name successful", ['account_name' => $account->member->name]));
    }

    public function logLoginFailure(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('login')
            ->log(__("User login by :account_name failed", ['account_name' => $account->member->name]));
    }
}
