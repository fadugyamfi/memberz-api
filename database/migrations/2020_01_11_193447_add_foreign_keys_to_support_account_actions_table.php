<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToSupportAccountActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('support_account_actions', function(Blueprint $table)
		{
			$table->foreign('support_account_id', 'support_account_actions_ibfk_1')->references('id')->on('support_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('support_account_actions', function(Blueprint $table)
		{
			$table->dropForeign('support_account_actions_ibfk_1');
		});
	}

}
