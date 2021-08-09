<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsAccountTopupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_account_topups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_sms_account_id')->unsigned()->nullable()->index('module_sms_account_id');
			$table->integer('organisation_invoice_id')->unsigned()->nullable()->index('organisation_transaction_id');
			$table->smallInteger('module_sms_credit_id')->unsigned()->nullable()->index('module_sms_account_topups_3');
			$table->integer('credit_amount')->nullable();
			$table->boolean('credited')->nullable()->default(0)->comment('Set to 1 if the value has been assigned to the sms_account');
			$table->boolean('is_bonus')->nullable()->default(0);
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
		Schema::drop('module_sms_account_topups');
	}

}
