<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationEventTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_event_tickets', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_event_tickets_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_event_id', 'organisation_event_tickets_ibfk_2')->references('id')->on('organisation_events')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('currency_id', 'organisation_event_tickets_ibfk_3')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_event_tickets', function(Blueprint $table)
		{
			$table->dropForeign('organisation_event_tickets_ibfk_1');
			$table->dropForeign('organisation_event_tickets_ibfk_2');
			$table->dropForeign('organisation_event_tickets_ibfk_3');
		});
	}

}
