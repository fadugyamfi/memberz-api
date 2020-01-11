<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToMemberAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_accounts', function(Blueprint $table)
		{
			$table->foreign('member_id', 'member_accounts_ibfk_1')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_accounts', function(Blueprint $table)
		{
			$table->dropForeign('member_accounts_ibfk_1');
		});
	}

}
