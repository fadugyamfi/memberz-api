<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationGroupTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_group_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->string('name', 40)->nullable();
			$table->string('description', 200)->nullable();
			$table->boolean('show_on_reg_forms')->nullable()->default(1);
			$table->boolean('allow_multi_select')->nullable()->default(1);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
		});

		DB::unprepared('ALTER TABLE `organisation_accounts` DROP PRIMARY KEY, ADD PRIMARY KEY (  `id` ,  `organisation_id` )');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_group_types');
	}

}
