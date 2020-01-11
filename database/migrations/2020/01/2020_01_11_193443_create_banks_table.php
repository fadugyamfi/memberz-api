<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banks', function(Blueprint $table)
		{
			$table->smallInteger('id', true)->unsigned();
			$table->integer('country_id')->nullable()->index('country_id');
			$table->string('name', 200)->nullable();
			$table->string('short_code', 5)->nullable();
			$table->string('swift_code', 15)->nullable();
			$table->string('address', 200)->nullable();
			$table->string('phone_numbers', 100)->nullable();
			$table->string('email', 50)->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modifid')->nullable();
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
		Schema::drop('banks');
	}

}
