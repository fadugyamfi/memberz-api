<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsCreditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_credits', function(Blueprint $table)
		{
			$table->smallInteger('id', true)->unsigned();
			$table->integer('credit_amount')->nullable();
			$table->float('cost', 10)->nullable();
			$table->float('unit_price', 10, 4)->nullable();
			$table->integer('currency_id')->unsigned()->nullable();
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
		Schema::drop('module_sms_credits');
	}

}
