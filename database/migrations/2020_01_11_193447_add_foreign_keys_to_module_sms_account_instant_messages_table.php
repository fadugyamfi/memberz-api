<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleSmsAccountInstantMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_sms_account_instant_messages', function(Blueprint $table)
		{
			$table->foreign('module_sms_account_id', 'module_sms_account_instant_messages_ibfk_1')->references('id')->on('module_sms_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_sms_account_instant_messages', function(Blueprint $table)
		{
			$table->dropForeign('module_sms_account_instant_messages_ibfk_1');
		});
	}

}