<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('first_name', 50)->default('');
			$table->string('last_name', 50)->default('');
			$table->string('username', 50);
			$table->string('password', 100);
			$table->string('pass_salt', 200)->nullable();
			$table->string('email')->nullable();
			$table->smallInteger('department_id')->nullable();
			$table->enum('team', array('Alpha Team','Bravo Team','Charlie Team','Delta Team'))->nullable();
			$table->integer('user_role_id')->nullable()->index('usr_role_fk');
			$table->string('security_question', 200)->nullable();
			$table->string('security_answer', 200)->nullable();
			$table->dateTime('last_access_dt')->nullable();
			$table->boolean('active')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
