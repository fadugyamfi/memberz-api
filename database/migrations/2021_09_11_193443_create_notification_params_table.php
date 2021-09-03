<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateNotificationParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_params', function(Blueprint $table)
		{
			$table->increments('id');
			$table->foreignId('notification_id')->nullable();
			$table->string('key')->nullable();
			$table->string('value')->nullable();
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
		Schema::drop('notification_params');
	}

}
