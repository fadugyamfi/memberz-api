<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddOrganisationIdToModuleSmsBroadcastListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_sms_broadcast_lists', function (Blueprint $table) {
            $table->unsignedInteger('organisation_id')->nullable()->index()->after('id');
        });

        Schema::table('module_sms_broadcast_list_filters', function (Blueprint $table) {
            $table->unsignedInteger('organisation_id')->nullable()->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_sms_broadcast_lists', function (Blueprint $table) {
            $table->dropColumn(['organisation_id']);
        });

        Schema::table('module_sms_broadcast_list_filters', function (Blueprint $table) {
            $table->dropColumn(['organisation_id']);
        });
    }
}
