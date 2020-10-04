<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSupportAccountActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_account_actions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('support_account_id')->unsigned()->nullable()->index('support_account_id');
			$table->string('model_name', 50)->nullable();
			$table->integer('model_id')->unsigned()->nullable();
			$table->string('action_desc')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
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
		Schema::drop('support_account_actions');
	}

}
