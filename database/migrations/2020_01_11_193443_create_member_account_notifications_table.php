<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberAccountNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_account_notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
			$table->integer('notification_type_id')->unsigned()->nullable()->index('notification_type_id');
			$table->integer('organisation_id')->unsigned()->nullable();
			$table->integer('source_id')->unsigned()->nullable();
			$table->integer('target_id')->unsigned()->nullable();
			$table->boolean('read')->nullable()->default(0);
			$table->boolean('sent')->nullable()->default(0);
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
		Schema::drop('member_account_notifications');
	}

}
