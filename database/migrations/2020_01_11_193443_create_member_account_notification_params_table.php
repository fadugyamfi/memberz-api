<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberAccountNotificationParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_account_notification_params', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_account_notification_id')->unsigned()->nullable()->index('member_account_notification_id');
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
		Schema::drop('member_account_notification_params');
	}

}
