<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsAccountBroadcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_account_broadcasts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_sms_account_id')->unsigned()->nullable()->index('module_sms_account_id');
			$table->integer('module_sms_broadcast_list_id')->unsigned()->nullable()->index('module_sms_broadcast_list_id');
			$table->integer('organisation_member_category_id')->nullable();
			$table->string('message', 500)->nullable();
			$table->dateTime('send_at')->nullable();
			$table->integer('sent_offset')->nullable();
			$table->integer('sent_count')->nullable();
			$table->integer('sent_pages')->nullable()->default(0);
			$table->boolean('sent')->nullable()->default(0);
			$table->integer('scheduled_by')->unsigned()->nullable();
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
		Schema::drop('module_sms_account_broadcasts');
	}

}
