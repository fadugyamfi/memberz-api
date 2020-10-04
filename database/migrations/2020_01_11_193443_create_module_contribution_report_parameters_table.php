<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionReportParametersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_report_parameters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_contribution_report_id')->unsigned()->nullable()->index('module_sms_broadcast_list_id');
			$table->enum('parameter', array('start_date','end_date','ndate','year','month','week','currency'))->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_contribution_report_parameters');
	}

}
