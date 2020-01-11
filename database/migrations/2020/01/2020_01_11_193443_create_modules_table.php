<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
			$table->smallInteger('id', true)->unsigned();
			$table->string('name', 100)->nullable();
			$table->string('description')->nullable();
			$table->string('controller', 50)->nullable();
			$table->string('action', 50)->nullable();
			$table->string('arguments', 50)->nullable();
			$table->string('icon', 50)->nullable();
			$table->boolean('default_active')->nullable()->default(1);
			$table->boolean('add_to_menu')->nullable()->default(1);
			$table->boolean('menu_position')->nullable();
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
		Schema::drop('modules');
	}

}
