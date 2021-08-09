<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionReceiptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_receipts', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_receipts_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_account_id', 'module_contribution_receipts_ibfk_2')->references('id')->on('organisation_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_receipts', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_receipts_ibfk_1');
			$table->dropForeign('module_contribution_receipts_ibfk_2');
		});
	}

}
