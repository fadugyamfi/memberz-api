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
        DB::table('members')->where('active', 1)->latest()->chunk(100, function($members) {
            foreach($members as $member) {
                DB::table('member_accounts')
                    ->where('member_id', $member->id)
                    ->whereNull('mobile_number')
                    ->update([
                        'mobile_number' => $member->mobile_number
                    ]);
            }
        });
    }
}
