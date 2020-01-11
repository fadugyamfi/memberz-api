<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsAccountInstantMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_account_instant_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_sms_account_id')->unsigned()->nullable()->index('module_sms_account_id');
			$table->integer('member_id')->unsigned()->nullable();
			$table->string('to', 30)->nullable();
			$table->string('message', 500)->nullable();
			$table->boolean('bday_msg')->nullable()->default(0);
			$table->dateTime('sent_at')->nullable();
			$table->boolean('sent')->nullable()->default(0);
			$table->integer('sent_by')->unsigned()->nullable();
			$table->string('sent_status')->nullable();
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
		Schema::drop('module_sms_account_instant_messages');
	}

}
