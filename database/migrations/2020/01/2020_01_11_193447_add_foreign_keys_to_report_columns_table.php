<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToReportColumnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('report_columns', function(Blueprint $table)
		{
			$table->foreign('report_id', 'report_columns_ibfk_1')->references('id')->on('reports')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('report_columns', function(Blueprint $table)
		{
			$table->dropForeign('report_columns_ibfk_1');
		});
	}

}
