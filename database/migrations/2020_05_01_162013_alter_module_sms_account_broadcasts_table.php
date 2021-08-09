<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterModuleSmsAccountBroadcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_sms_account_broadcasts', function (Blueprint $table) {
            $table->tinyInteger('include_sub_categories')->nullable()->unsigned()->after('organisation_member_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_sms_account_broadcasts', function (Blueprint $table) {
            $table->dropColumn('include_sub_categories');
        });
    }
}
