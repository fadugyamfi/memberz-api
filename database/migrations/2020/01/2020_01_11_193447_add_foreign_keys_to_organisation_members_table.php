<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_members', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_members_ibfk_2')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('approved_by', 'organisation_members_ibfk_3')->references('id')->on('organisation_accounts')->onUpdate('NO ACTION')->onDelete('SET NULL');
			$table->foreign('organisation_member_category_id', 'organisation_members_ibfk_4')->references('id')->on('organisation_member_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_id', 'organisation_members_ibfk_5')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_members', function(Blueprint $table)
		{
			$table->dropForeign('organisation_members_ibfk_2');
			$table->dropForeign('organisation_members_ibfk_3');
			$table->dropForeign('organisation_members_ibfk_4');
			$table->dropForeign('organisation_members_ibfk_5');
		});
	}

}
