<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_sms_accounts', function (Blueprint $table) {
            $table->boolean('sender_id_approved')->default(0)->after('bonus_balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_sms_accounts', function (Blueprint $table) {
            $table->dropColumn(['sender_id_approved']);
        });
    }
};
