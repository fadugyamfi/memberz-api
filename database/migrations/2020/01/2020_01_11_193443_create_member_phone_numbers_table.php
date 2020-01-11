<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberPhoneNumbersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_phone_numbers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->string('type', 30)->nullable();
			$table->string('number', 30)->nullable()->index('number');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->unique(['member_id','type','number'], 'member_id_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_phone_numbers');
	}

}
