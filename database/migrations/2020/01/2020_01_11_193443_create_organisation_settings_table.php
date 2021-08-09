<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_settings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->smallInteger('organisation_setting_type_id')->nullable()->index('organisation_setting_type_id');
			$table->string('value', 500)->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
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
		Schema::drop('organisation_settings');
	}

}
