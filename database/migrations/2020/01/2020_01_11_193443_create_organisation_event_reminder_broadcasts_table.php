<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventReminderBroadcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_reminder_broadcasts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_event_reminder_id')->unsigned()->nullable()->index('organisation_event_reminder_id');
			$table->integer('module_sms_account_broadcast_id')->unsigned()->nullable()->index('module_sms_account_broadcast_id');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_event_reminder_broadcasts');
	}

}
