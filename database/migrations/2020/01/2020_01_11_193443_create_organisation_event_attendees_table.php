<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventAttendeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_attendees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable();
			$table->integer('organisation_event_id')->unsigned()->nullable()->index('organisation_event_id');
			$table->integer('organisation_event_session_id')->unsigned()->nullable()->index('organisation_event_session_id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->boolean('interested')->nullable()->default(0);
			$table->boolean('attended')->nullable()->default(0);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
			$table->unique(['organisation_id','organisation_event_id','member_id','organisation_event_session_id'], 'mark_once');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_event_attendees');
	}

}
