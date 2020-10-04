<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsBroadcastListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_broadcast_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_sms_account_id')->unsigned()->nullable()->index('module_sms_account_id');
			$table->string('name', 200)->nullable();
			$table->enum('type', array('predefined','custom'))->nullable();
			$table->string('sender_id', 20)->nullable();
			$table->integer('size')->nullable()->default(0);
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
		Schema::drop('module_sms_broadcast_lists');
	}

}
