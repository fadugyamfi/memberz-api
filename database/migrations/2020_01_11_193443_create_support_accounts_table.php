<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSupportAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
			$table->boolean('support_role_id')->nullable()->index('support_role_id');
			$table->dateTime('last_login')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('modified_by')->unsigned()->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->boolean('trashed')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('support_accounts');
	}

}
