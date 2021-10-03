<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToSupportAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('support_accounts', function(Blueprint $table)
		{
			$table->foreign('member_account_id', 'support_accounts_ibfk_1')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('support_role_id', 'support_accounts_ibfk_2')->references('id')->on('support_roles')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('support_accounts', function(Blueprint $table)
		{
			$table->dropForeign('support_accounts_ibfk_1');
			$table->dropForeign('support_accounts_ibfk_2');
		});
	}

}
