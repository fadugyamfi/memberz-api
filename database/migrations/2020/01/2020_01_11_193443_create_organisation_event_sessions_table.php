<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_sessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_event_id')->unsigned()->nullable()->index('organisation_event_id');
			$table->string('session_name', 200)->nullable();
			$table->dateTime('session_dt')->nullable();
			$table->integer('organisation_event_attendee_count')->nullable()->default(0);
			$table->integer('organisation_event_interested_count')->nullable()->default(0);
			$table->string('registration_code', 20)->nullable()->unique('registration_code');
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
		Schema::drop('organisation_event_sessions');
	}

}
