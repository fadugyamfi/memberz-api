<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationCalendarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_calendars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->string('name', 150)->nullable();
			$table->string('color', 20)->nullable();
			$table->smallInteger('organisation_event_count')->nullable()->default(0);
			$table->boolean('is_default')->nullable()->default(0);
			$table->boolean('fetch_events_on_load')->nullable()->default(1);
			$table->boolean('show_publicly')->nullable()->default(0);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_calendars');
	}

}
