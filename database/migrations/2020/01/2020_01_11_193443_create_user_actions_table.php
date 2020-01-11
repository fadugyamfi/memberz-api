<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUserActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_actions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable()->index('act_user_fk');
			$table->integer('action_id')->nullable()->comment('The ID of the item being worked on, e.g. jobsheet_id');
			$table->string('action_desc', 200)->nullable()->comment('A Desc of the Action Carried Out, e.g. "created jobsheet"');
			$table->dateTime('action_dt')->nullable()->comment('Date and Time of action');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_actions');
	}

}
