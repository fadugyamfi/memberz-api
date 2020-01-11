<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSubscriptionTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscription_types', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('name', 50)->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('capacity')->nullable();
			$table->enum('validity', array('monthly','quarterly','half_yearly','yearly','forever'))->nullable();
			$table->integer('currency_id')->unsigned()->nullable();
			$table->float('initial_price', 10)->nullable();
			$table->float('renewal_price', 10)->nullable();
			$table->enum('billing_required', array('no','yes'))->nullable()->default('yes');
			$table->integer('initial_sms_credit')->nullable()->default(0);
			$table->integer('monthly_sms_bonus')->nullable();
			$table->smallInteger('accounts')->nullable();
			$table->enum('reporting', array('basic','advanced'))->nullable()->default('basic');
			$table->boolean('revenue_tracking')->nullable()->default(1);
			$table->boolean('expenditure_tracking')->nullable()->default(0);
			$table->boolean('events')->nullable()->default(0);
			$table->boolean('featured')->nullable()->default(0);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('promotional')->nullable()->default(0);
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
		Schema::drop('subscription_types');
	}

}
