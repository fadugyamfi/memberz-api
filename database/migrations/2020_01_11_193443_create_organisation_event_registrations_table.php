<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationEventRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_event_registrations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_event_id')->unsigned()->nullable()->index('organisation_event_id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->boolean('paid')->nullable()->default(0);
			$table->float('fee_amount_paid', 10)->nullable()->default(0.00);
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
		Schema::drop('organisation_event_registrations');
	}

}
