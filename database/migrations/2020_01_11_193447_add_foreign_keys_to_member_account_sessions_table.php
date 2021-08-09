<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToMemberAccountSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_account_sessions', function(Blueprint $table)
		{
			$table->foreign('member_account_id', 'member_account_sessions_ibfk_1')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_account_sessions', function(Blueprint $table)
		{
			$table->dropForeign('member_account_sessions_ibfk_1');
		});
	}

}
