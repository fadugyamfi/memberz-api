<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsBroadcastListContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_broadcast_list_contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_sms_broadcast_list_id')->unsigned()->nullable()->index('module_sms_broadcast_list_id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->string('name', 200)->nullable();
			$table->string('number', 20)->nullable();
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
		Schema::drop('module_sms_broadcast_list_contacts');
	}

}
