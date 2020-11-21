<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMemberGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_member_groups', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_member_groups_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_id', 'organisation_member_groups_ibfk_2')->references('id')->on('organisation_members')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_group_id', 'organisation_member_groups_ibfk_3')->references('id')->on('organisation_groups')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_member_groups', function(Blueprint $table)
		{
			$table->dropForeign('organisation_member_groups_ibfk_1');
			$table->dropForeign('organisation_member_groups_ibfk_2');
			$table->dropForeign('organisation_member_groups_ibfk_3');
		});
	}

}