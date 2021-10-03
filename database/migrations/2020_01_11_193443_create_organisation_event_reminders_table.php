<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventRemindersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_reminders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_event_id')->unsigned()->nullable()->index('organisation_event_id');
			$table->integer('minutes_before')->nullable();
			$table->dateTime('reminder_dt')->nullable();
			$table->integer('organisation_member_category_id')->nullable();
			$table->integer('module_sms_broadcast_list_id')->nullable();
			$table->string('sms_message', 500)->nullable();
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
		Schema::drop('organisation_event_reminders');
	}

}
