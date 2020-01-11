<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModulePledgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_pledges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('module_pledge_type_id')->unsigned()->nullable()->index('module_pledge_type_id');
			$table->integer('organisation_member_id')->unsigned()->nullable()->index('organisation_member_id');
			$table->float('amount_pledged', 10)->nullable();
			$table->float('amount_redeemed', 10)->nullable();
			$table->date('pledge_dt')->nullable();
			$table->boolean('redeemed')->nullable()->default(0);
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
		Schema::drop('module_pledges');
	}

}
