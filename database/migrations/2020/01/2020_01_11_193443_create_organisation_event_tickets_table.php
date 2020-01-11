<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_tickets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_event_id')->unsigned()->nullable()->index('organisation_event_id');
			$table->string('title', 100)->nullable();
			$table->string('description')->nullable();
			$table->integer('currency_id')->nullable()->index('currency_id');
			$table->float('amount', 10)->nullable()->default(0.00);
			$table->integer('quantity')->nullable();
			$table->boolean('rank')->nullable()->default(1);
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
		Schema::drop('organisation_event_tickets');
	}

}
