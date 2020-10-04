<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberAccountSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_account_sessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
			$table->dateTime('session_start_dt')->nullable();
			$table->dateTime('session_expiry_dt')->nullable();
			$table->string('session_device_id', 50)->nullable();
			$table->string('session_last_ip', 20)->nullable();
			$table->string('session_user_agent', 200)->nullable();
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
		Schema::drop('member_account_sessions');
	}

}
