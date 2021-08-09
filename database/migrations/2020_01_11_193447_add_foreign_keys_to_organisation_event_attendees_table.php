<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationEventAttendeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_event_attendees', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_event_attendees_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_event_id', 'organisation_event_attendees_ibfk_2')->references('id')->on('organisation_events')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_id', 'organisation_event_attendees_ibfk_3')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_event_session_id', 'organisation_event_attendees_ibfk_4')->references('id')->on('organisation_event_sessions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_event_attendees', function(Blueprint $table)
		{
			$table->dropForeign('organisation_event_attendees_ibfk_1');
			$table->dropForeign('organisation_event_attendees_ibfk_2');
			$table->dropForeign('organisation_event_attendees_ibfk_3');
			$table->dropForeign('organisation_event_attendees_ibfk_4');
		});
	}

}
