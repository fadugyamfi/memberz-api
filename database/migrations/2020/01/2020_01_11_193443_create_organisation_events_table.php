<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_calendar_id')->unsigned()->nullable()->index('organisation_calendar_id');
			$table->string('event_name')->nullable();
			$table->string('slug', 200)->nullable()->unique('slug');
			$table->string('short_description')->nullable();
			$table->text('long_description', 65535)->nullable();
			$table->string('photo')->nullable();
			$table->string('photo_thumb')->nullable();
			$table->dateTime('start_dt')->nullable();
			$table->dateTime('end_dt')->nullable();
			$table->boolean('all_day')->nullable()->default(0);
			$table->string('venue')->nullable();
			$table->string('gps_location')->nullable();
			$table->string('cost')->nullable()->default('0.00');
			$table->integer('currency_id')->nullable()->index('currency_id');
			$table->boolean('registration_enabled')->nullable()->default(0);
			$table->integer('capacity')->nullable()->default(0);
			$table->boolean('attendee_self_reporting')->nullable()->default(0);
			$table->boolean('require_session_code')->nullable()->default(0);
			$table->integer('organisation_event_attendee_count')->nullable()->default(0);
			$table->integer('organisation_event_interested_count')->nullable()->default(0);
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
		Schema::drop('organisation_events');
	}

}
