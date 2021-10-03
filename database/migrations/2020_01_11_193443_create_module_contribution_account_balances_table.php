<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionAccountBalancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_account_balances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('module_contribution_account_id')->unsigned()->nullable()->index('module_contribution_account_id');
			$table->float('balance', 10)->nullable();
			$table->dateTime('balance_dt')->nullable();
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
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
		Schema::drop('module_contribution_account_balances');
	}

}
