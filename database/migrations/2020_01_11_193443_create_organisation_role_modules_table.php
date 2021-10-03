<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationRoleModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_role_modules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_role_id')->unsigned()->nullable()->index('organisation_role_id');
			$table->smallInteger('module_id')->unsigned()->nullable();
			$table->string('module_menu_ids')->nullable()->default('')->comment('Comma separated list of module_menu_id values');
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
		Schema::drop('organisation_role_modules');
	}

}
