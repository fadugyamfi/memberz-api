<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModulePledgeRedemptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_pledge_redemptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable();
			$table->integer('module_pledge_id')->unsigned()->nullable();
			$table->integer('organisation_member_id')->unsigned()->nullable();
			$table->float('amount', 10)->nullable();
			$table->string('receipt_no', 20)->nullable();
			$table->dateTime('receipt_dt')->nullable();
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
		Schema::drop('module_pledge_redemptions');
	}

}
