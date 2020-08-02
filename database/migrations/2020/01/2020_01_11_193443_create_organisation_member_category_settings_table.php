<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMemberCategorySettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_member_category_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->integer('organisation_member_category_id')->unsigned()->nullable()->index('organisation_member_category_id');
			$table->smallInteger('member_category_setting_id')->unsigned()->nullable()->index('member_category_setting_id');
			$table->string('value', 200)->nullable();
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
		Schema::drop('organisation_member_category_settings');
	}

}
