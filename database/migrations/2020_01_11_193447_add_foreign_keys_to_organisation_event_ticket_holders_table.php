<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationEventTicketHoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_event_ticket_holders', function(Blueprint $table)
		{
			$table->foreign('organisation_event_ticket_id', 'organisation_event_ticket_holders_ibfk_1')->references('id')->on('organisation_event_tickets')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_account_id', 'organisation_event_ticket_holders_ibfk_2')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_event_ticket_holders', function(Blueprint $table)
		{
			$table->dropForeign('organisation_event_ticket_holders_ibfk_1');
			$table->dropForeign('organisation_event_ticket_holders_ibfk_2');
		});
	}

}
