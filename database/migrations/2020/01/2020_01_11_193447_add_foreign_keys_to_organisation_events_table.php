<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_events', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_events_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_calendar_id', 'organisation_events_ibfk_2')->references('id')->on('organisation_calendars')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('currency_id', 'organisation_events_ibfk_3')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_events', function(Blueprint $table)
		{
			$table->dropForeign('organisation_events_ibfk_1');
			$table->dropForeign('organisation_events_ibfk_2');
			$table->dropForeign('organisation_events_ibfk_3');
		});
	}

}
