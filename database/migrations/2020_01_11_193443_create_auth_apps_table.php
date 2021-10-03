<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthAppsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_apps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('app_id', 50)->nullable()->unique('app_id');
			$table->string('app_key', 100)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('description')->nullable();
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->boolean('all_access')->nullable()->default(0);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auth_apps');
	}

}
