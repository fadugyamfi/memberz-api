<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationGroupLeadersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_group_leaders', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_group_leaders_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_group_id', 'organisation_group_leaders_ibfk_2')->references('id')->on('organisation_groups')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_id', 'organisation_group_leaders_ibfk_5')->references('id')->on('organisation_members')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_group_leaders', function(Blueprint $table)
		{
			$table->dropForeign('organisation_group_leaders_ibfk_1');
			$table->dropForeign('organisation_group_leaders_ibfk_2');
			$table->dropForeign('organisation_group_leaders_ibfk_5');
		});
	}

}
