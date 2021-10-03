<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('module_id')->unsigned()->nullable()->index('module_id');
			$table->string('display_name', 50)->nullable();
			$table->string('controller', 50)->nullable();
			$table->string('action', 50)->nullable();
			$table->string('arguments', 50)->nullable();
			$table->string('icon', 50)->nullable();
			$table->smallInteger('position')->nullable()->default(1);
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
		Schema::drop('module_menus');
	}

}
