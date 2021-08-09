<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionAccountBalancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_account_balances', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_account_balances_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_contribution_account_id', 'module_contribution_account_balances_ibfk_2')->references('id')->on('module_contribution_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_account_id', 'module_contribution_account_balances_ibfk_3')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_account_balances', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_account_balances_ibfk_1');
			$table->dropForeign('module_contribution_account_balances_ibfk_2');
			$table->dropForeign('module_contribution_account_balances_ibfk_3');
		});
	}

}
