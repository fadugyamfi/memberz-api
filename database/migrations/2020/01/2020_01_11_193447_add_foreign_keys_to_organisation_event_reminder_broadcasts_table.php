<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationEventReminderBroadcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_event_reminder_broadcasts', function(Blueprint $table)
		{
			$table->foreign('organisation_event_reminder_id', 'organisation_event_reminder_broadcasts_ibfk_1')->references('id')->on('organisation_events')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_sms_account_broadcast_id', 'organisation_event_reminder_broadcasts_ibfk_2')->references('id')->on('module_sms_account_broadcasts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_event_reminder_broadcasts', function(Blueprint $table)
		{
			$table->dropForeign('organisation_event_reminder_broadcasts_ibfk_1');
			$table->dropForeign('organisation_event_reminder_broadcasts_ibfk_2');
		});
	}

}
