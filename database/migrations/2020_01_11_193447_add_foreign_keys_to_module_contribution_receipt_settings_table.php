<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionReceiptSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_receipt_settings', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_receipt_settings_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('default_currency', 'module_contribution_receipt_settings_ibfk_2')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_receipt_settings', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_receipt_settings_ibfk_1');
			$table->dropForeign('module_contribution_receipt_settings_ibfk_2');
		});
	}

}
