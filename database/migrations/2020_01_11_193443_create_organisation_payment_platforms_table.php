<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationPaymentPlatformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_payment_platforms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->boolean('payment_platform_id')->nullable()->index('payment_platform_id');
			$table->integer('currency_id')->nullable()->index('currency_id');
			$table->integer('country_id')->nullable()->index('country_id');
			$table->string('config', 500)->nullable();
			$table->enum('platform_mode', array('live','sandbox'))->nullable()->default('sandbox');
			$table->string('member_registration_instruction', 500)->nullable();
			$table->string('event_registration_instruction', 500)->nullable();
			$table->string('general_instructions', 500)->nullable();
			$table->boolean('system_generated')->nullable()->default(0);
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
		Schema::drop('organisation_payment_platforms');
	}

}
