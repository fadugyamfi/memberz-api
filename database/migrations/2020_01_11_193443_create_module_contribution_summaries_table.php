<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionSummariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_summaries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable();
			$table->date('receipt_dt')->nullable();
			$table->integer('module_contribution_type_id')->unsigned()->nullable()->index('module_contribution_type_id');
			$table->boolean('week')->nullable()->default(1);
			$table->boolean('month')->nullable()->default(1);
			$table->smallInteger('year')->nullable()->default(2015);
			$table->integer('currency_id')->nullable()->index('currency_id');
			$table->float('amount', 10)->nullable()->default(0.00);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
			$table->index(['organisation_id','year','module_contribution_type_id','month','week','currency_id'], 'summary');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_contribution_summaries');
	}

}
