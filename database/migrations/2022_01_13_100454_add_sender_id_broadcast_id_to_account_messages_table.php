<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenderIdBroadcastIdToAccountMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_sms_account_instant_messages', function (Blueprint $table) {
            $table->string('sender_id', 20)->nullable()->index('sender_id_idx')->after('message');
            $table->unsignedInteger('module_sms_account_broadcast_id')->nullable()->index('broadcast_id_idx')->after('sender_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_sms_account_instant_messages', function (Blueprint $table) {
            $table->dropIndex('sender_id_idx');
            $table->dropIndex('broadcast_id_idx');
            $table->dropColumn(['sender_id', 'module_sms_account_broadcast_id']);
        });
    }
}
