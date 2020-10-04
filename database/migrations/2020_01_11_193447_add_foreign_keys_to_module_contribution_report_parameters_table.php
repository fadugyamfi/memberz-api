<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionReportParametersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_report_parameters', function(Blueprint $table)
		{
			$table->foreign('module_contribution_report_id', 'module_contribution_report_parameters_ibfk_1')->references('id')->on('module_contribution_reports')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_report_parameters', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_report_parameters_ibfk_1');
		});
	}

}
