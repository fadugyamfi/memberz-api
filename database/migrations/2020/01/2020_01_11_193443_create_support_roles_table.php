<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSupportRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_roles', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('name', 100)->nullable();
			$table->boolean('manage_members')->nullable()->default(0);
			$table->boolean('manage_organisations')->nullable()->default(0);
			$table->boolean('manage_support_users')->nullable()->default(0);
			$table->boolean('manage_reports')->nullable()->default(0);
			$table->boolean('access_reports')->nullable()->default(0);
			$table->boolean('manage_images')->nullable()->default(0);
			$table->boolean('manage_system_settings')->nullable()->default(0);
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
		Schema::drop('support_roles');
	}

}
