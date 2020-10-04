<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateReportColumnOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_column_options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('field_name', 200)->nullable();
			$table->string('display_name', 200)->nullable();
			$table->enum('type', array('text','date','datetime','boolean','number'))->nullable();
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
		Schema::drop('report_column_options');
	}

}
