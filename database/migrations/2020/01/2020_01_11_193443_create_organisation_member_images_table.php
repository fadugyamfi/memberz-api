<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMemberImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_member_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->integer('organisation_member_id')->unsigned()->nullable()->index('organisation_member_id');
			$table->integer('member_image_id')->unsigned()->nullable()->index('member_id');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->integer('deleted')->default(0);
			$table->boolean('active')->nullable()->default(1);
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
		Schema::drop('organisation_member_images');
	}

}
