<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_reports', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_reports_ibfk_1')->references('id')->on('organisations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_reports', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_reports_ibfk_1');
		});
	}

}
