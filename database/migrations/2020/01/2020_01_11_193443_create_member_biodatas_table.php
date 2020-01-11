<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberBiodatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_biodatas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->binary('image', 16777215)->nullable();
			$table->binary('fingerprint', 16777215)->nullable();
			$table->binary('fingerprint_template', 16777215)->nullable();
			$table->binary('signature', 16777215)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_biodatas');
	}

}
