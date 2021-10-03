<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberAccountDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_account_devices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_account_id')->unsigned()->nullable();
			$table->string('device_id', 50)->nullable();
			$table->string('device_user_agent')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
			$table->unique(['member_account_id','device_id'], 'member_account_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_account_devices');
	}

}
