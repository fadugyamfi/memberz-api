<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiltersToModuleSmsBroadcastListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_sms_broadcast_lists', function (Blueprint $table) {
            $table->json('filters')->nullable()->after('size');
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
            $table->dropColumn(['filters']);
        });
    }
}
