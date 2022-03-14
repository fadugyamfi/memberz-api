<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateMemberAccountsMobileNumberWithMemberMobileNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('member_accounts')
            ->join('members', 'members.id', '=', 'member_accounts.member_id')
            ->whereNull('member_accounts.mobile_number')
            ->update(['member_accounts.mobile_number' => DB::raw('members.mobile_number')]);
    }
}
