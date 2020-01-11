<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->string('username', 200)->nullable()->unique('username_idx');
			$table->string('password', 200)->nullable();
			$table->string('pass_salt', 50)->nullable();
			$table->string('timezone', 50)->nullable();
			$table->dateTime('last_login')->nullable();
			$table->enum('account_type', array('primary','alias'))->nullable()->default('primary');
			$table->boolean('reset_requested')->nullable()->default(0);
			$table->smallInteger('organisation_count')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->boolean('deleted')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_accounts');
	}

}
