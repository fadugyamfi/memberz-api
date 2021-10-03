<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventTicketHoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_ticket_holders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_event_ticket_id')->unsigned()->index('organisation_event_ticket_id');
			$table->integer('member_account_id')->unsigned()->index('member_account_id');
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
		Schema::drop('organisation_event_ticket_holders');
	}

}
