<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_reports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('module_contribution_repot_org_id');
			$table->string('name', 200)->nullable();
			$table->text('description', 65535)->nullable();
			$table->enum('type', array('predefined','custom'))->nullable();
			$table->string('query_file', 250)->nullable()->default('0');
			$table->string('view_file', 250)->nullable();
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
		Schema::drop('module_contribution_reports');
	}

}
