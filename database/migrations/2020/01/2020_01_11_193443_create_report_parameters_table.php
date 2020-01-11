<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateReportParametersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_parameters', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('report_id')->unsigned()->nullable();
			$table->string('label', 200)->nullable();
			$table->string('name', 200)->nullable();
			$table->enum('type', array('number','text','date','datetime','list','hidden'))->nullable();
			$table->string('value', 200)->nullable();
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
		Schema::drop('report_parameters');
	}

}
