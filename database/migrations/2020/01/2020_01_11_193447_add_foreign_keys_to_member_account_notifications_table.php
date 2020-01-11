<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToMemberAccountNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_account_notifications', function(Blueprint $table)
		{
			$table->foreign('notification_type_id', 'member_account_notifications_ibfk_2')->references('id')->on('notification_types')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_account_id', 'member_account_notifications_ibfk_3')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_account_notifications', function(Blueprint $table)
		{
			$table->dropForeign('member_account_notifications_ibfk_2');
			$table->dropForeign('member_account_notifications_ibfk_3');
		});
	}

}
