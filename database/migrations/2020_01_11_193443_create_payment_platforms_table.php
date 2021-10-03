<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePaymentPlatformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_platforms', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('name', 100)->nullable();
			$table->string('description', 150)->nullable();
			$table->string('method_name', 30)->nullable();
			$table->string('config_keys', 100)->nullable()->comment('Comma seperated list of keys for configuring the platform connection');
			$table->string('logo')->nullable();
			$table->string('instructions')->nullable();
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
		Schema::drop('payment_platforms');
	}

}
