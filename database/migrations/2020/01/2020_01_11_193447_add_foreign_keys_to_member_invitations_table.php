<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToMemberInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_invitations', function(Blueprint $table)
		{
			$table->foreign('member_id', 'member_invitations_ibfk_1')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_account_id', 'member_invitations_ibfk_2')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_id', 'member_invitations_ibfk_3')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_invitations', function(Blueprint $table)
		{
			$table->dropForeign('member_invitations_ibfk_1');
			$table->dropForeign('member_invitations_ibfk_2');
			$table->dropForeign('member_invitations_ibfk_3');
		});
	}

}
