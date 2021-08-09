<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_modules', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_modules_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_id', 'organisation_modules_ibfk_2')->references('id')->on('modules')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_modules', function(Blueprint $table)
		{
			$table->dropForeign('organisation_modules_ibfk_1');
			$table->dropForeign('organisation_modules_ibfk_2');
		});
	}

}
