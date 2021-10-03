<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->string('name', 100)->nullable();
			$table->string('description')->nullable();
			$table->enum('account_type', array('Current','Savings','Investment','Cash'))->nullable();
			$table->smallInteger('bank_id')->unsigned()->nullable()->index('bank_id');
			$table->float('amount', 10)->nullable();
			$table->integer('currency_id')->nullable()->index('currency_id');
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
		Schema::drop('module_contribution_accounts');
	}

}
