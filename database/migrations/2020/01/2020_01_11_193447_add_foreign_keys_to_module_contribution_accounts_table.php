<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_accounts', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_accounts_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('currency_id', 'module_contribution_accounts_ibfk_2')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('bank_id', 'module_contribution_accounts_ibfk_3')->references('id')->on('banks')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_accounts', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_accounts_ibfk_1');
			$table->dropForeign('module_contribution_accounts_ibfk_2');
			$table->dropForeign('module_contribution_accounts_ibfk_3');
		});
	}

}
