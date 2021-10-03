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

    public function logNewAccountRegistered(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('login')
            ->log(__("New account registered by :account_name", ['account_name' => $account->member->name]));
    }

    public function logPasswordReset(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('login')
            ->log(__("Password reset for account of :account_name", ['account_name' => $account->member->name]));
    }

    public function logAccountActivated(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('login')
            ->log(__("User \":account_name\" activated account", ['account_name' => $account->member->name]));
    }

    public function logPasswordResetLinkRequested(MemberAccount $account) {
        activity()
            ->inLog("auth")
            ->causedBy($account)
            ->performedOn($account)
            ->event('login')
            ->log(__("Password reset link requested by \":account_name\"", ['account_name' => $account->member->name]));
    }
}
