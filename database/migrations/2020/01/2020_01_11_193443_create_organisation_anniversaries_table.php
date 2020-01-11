<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationAnniversariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_anniversaries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->string('name', 50)->nullable();
			$table->string('description', 100)->nullable();
			$table->integer('organisation_member_anniversary_count')->nullable()->default(0);
			$table->boolean('show_on_reg_forms')->nullable()->default(0);
			$table->boolean('send_anniversary_message')->nullable()->default(0);
			$table->text('message', 65535)->nullable();
			$table->boolean('notify_on_anniversary')->nullable()->default(1);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(0);
			$table->primary(['id','organisation_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_anniversaries');
	}

}
