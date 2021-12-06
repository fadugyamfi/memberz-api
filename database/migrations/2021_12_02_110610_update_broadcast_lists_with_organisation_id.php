<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateBroadcastListsWithOrganisationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('module_sms_broadcast_lists')
            ->join('module_sms_accounts', 'module_sms_accounts.id', '=', 'module_sms_broadcast_lists.module_sms_account_id')
            ->update(['module_sms_broadcast_lists.organisation_id' => DB::raw('module_sms_accounts.organisation_id')]);

        DB::table('module_sms_broadcast_list_filters')
            ->join('module_sms_broadcast_lists', 'module_sms_broadcast_lists.id', '=', 'module_sms_broadcast_list_filters.module_sms_broadcast_list_id')
            ->update(['module_sms_broadcast_list_filters.organisation_id' => DB::raw('module_sms_broadcast_lists.organisation_id')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('module_sms_broadcast_lists')->update(['organisation_id' => null]);
        DB::table('module_sms_broadcast_list_filters')->update(['organisation_id' => null]);
    }
}
