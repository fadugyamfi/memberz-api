<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationEventRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_event_registrations', function(Blueprint $table)
		{
			$table->foreign('organisation_event_id', 'organisation_event_registrations_ibfk_1')->references('id')->on('organisation_events')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_id', 'organisation_event_registrations_ibfk_2')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_event_registrations', function(Blueprint $table)
		{
			$table->dropForeign('organisation_event_registrations_ibfk_1');
			$table->dropForeign('organisation_event_registrations_ibfk_2');
		});
	}

}
