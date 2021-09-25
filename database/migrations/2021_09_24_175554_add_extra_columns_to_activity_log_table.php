<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('activitylog.database_connection'))->table(config('activitylog.table_name'), function (Blueprint $table) {
            $table->string('ip_address')->nullable()->after('batch_uuid');
            $table->string('user_agent')->nullable()->after('ip_address');
            $table->unsignedInteger('organisation_id')->nullable()->after('user_agent');

            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(config('activitylog.database_connection'))->table(config('activitylog.table_name'), function (Blueprint $table) {
            $table->dropColumn('ip_address', 'user_agent', 'organisation_id');
            $table->dropForeign('organisation_id');
        });
    }
}
