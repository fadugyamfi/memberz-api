<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberParentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_parents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->string('name', 150)->nullable();
			$table->string('gender', 10)->nullable();
			$table->date('dob')->nullable();
			$table->boolean('is_alive')->nullable()->default(1);
			$table->integer('parent_member_id')->unsigned()->nullable();
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
		Schema::drop('member_parents');
	}

}
