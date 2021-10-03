<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateNotificationTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100)->nullable()->unique('name');
			$table->string('url')->nullable();
			$table->string('template')->nullable();
			$table->boolean('groupable')->nullable()->default(0);
			$table->string('source_type', 100)->nullable();
			$table->string('target_type', 100)->nullable();
			$table->boolean('org_admin_only')->nullable()->default(0);
			$table->boolean('send_email')->nullable()->default(0);
			$table->string('email_subject')->nullable()->default('');
			$table->boolean('send_push_notification')->nullable()->default(0);
			$table->string('icon', 50)->nullable();
			$table->boolean('org_login_required')->nullable()->default(1);
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
		Schema::drop('notification_types');
	}

}
