<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_accounts', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_accounts_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_role_id', 'organisation_accounts_ibfk_2')->references('id')->on('organisation_roles')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_account_id', 'organisation_accounts_ibfk_3')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_accounts', function(Blueprint $table)
		{
			$table->dropForeign('organisation_accounts_ibfk_1');
			$table->dropForeign('organisation_accounts_ibfk_2');
			$table->dropForeign('organisation_accounts_ibfk_3');
		});
	}

}
