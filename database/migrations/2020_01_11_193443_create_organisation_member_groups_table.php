<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMemberGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_member_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_member_id')->unsigned()->nullable()->index('member_id');
			$table->integer('organisation_group_id')->unsigned()->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->index(['organisation_group_id','organisation_id'], 'organisation_member_groups_ibfk_4');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_member_groups');
	}

}
