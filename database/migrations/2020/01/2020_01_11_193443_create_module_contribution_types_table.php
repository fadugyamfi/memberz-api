<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->string('name', 50)->nullable();
			$table->string('description', 200)->nullable();
			$table->enum('member_required', array('Required','Not Required'))->nullable()->default('Required');
			$table->boolean('fix_amount_per_period')->nullable()->default(0);
			$table->integer('currency_id')->nullable();
			$table->float('fixed_amount', 10)->nullable();
			$table->boolean('system_generated')->nullable()->default(0);
			$table->boolean('active')->nullable()->default(1);
			$table->primary(['id','organisation_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_contribution_types');
	}

}
