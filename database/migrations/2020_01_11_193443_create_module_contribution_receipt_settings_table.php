<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionReceiptSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_receipt_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->enum('receipt_mode', array('manual','auto'))->nullable();
			$table->string('receipt_prefix', 20)->nullable();
			$table->string('receipt_postfix', 20)->nullable();
			$table->integer('receipt_counter')->nullable();
			$table->integer('default_currency')->nullable()->default(80)->index('default_currency');
			$table->boolean('sms_notify')->nullable()->default(0);
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
		Schema::drop('module_contribution_receipt_settings');
	}

}
