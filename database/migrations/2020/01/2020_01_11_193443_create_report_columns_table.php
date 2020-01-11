<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateReportColumnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_columns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('report_id')->unsigned()->nullable()->index('report_id');
			$table->integer('report_column_option_id')->unsigned()->nullable();
			$table->boolean('position')->nullable();
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
		Schema::drop('report_columns');
	}

}
