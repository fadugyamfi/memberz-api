<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModulePledgeTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_pledge_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->string('name')->nullable();
			$table->smallInteger('currency_id')->unsigned()->nullable();
			$table->decimal('min_amount', 10)->nullable()->default(0.00);
			$table->decimal('target_amount', 10)->nullable();
			$table->date('target_dt')->nullable();
			$table->string('reminder_message', 500)->nullable();
			$table->dateTime('reminder_start_dt')->nullable();
			$table->dateTime('reminder_end_dt')->nullable();
			$table->dateTime('next_reminder_dt')->nullable();
			$table->boolean('send_reminder_sms')->nullable()->default(0);
			$table->enum('reminder_frequency', array('daily','weekly','bi-monthly','monthly','quarterly'))->nullable();
			$table->decimal('total_pledged', 10)->nullable()->default(0.00);
			$table->decimal('total_redeemed', 10)->nullable()->default(0.00);
			$table->decimal('total_remaining', 10)->nullable()->default(0.00);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_pledge_types');
	}

}
