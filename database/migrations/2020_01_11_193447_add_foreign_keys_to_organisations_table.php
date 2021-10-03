<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisations', function(Blueprint $table)
		{
			$table->foreign('organisation_type_id', 'organisations_ibfk_1')->references('id')->on('organisation_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('member_account_id', 'organisations_ibfk_2')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisations', function(Blueprint $table)
		{
			$table->dropForeign('organisations_ibfk_1');
			$table->dropForeign('organisations_ibfk_2');
		});
	}

}
