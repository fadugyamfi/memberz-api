<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_groups', function(Blueprint $table)
		{
			$table->foreign('organisation_group_type_id', 'organisation_groups_ibfk_1')->references('id')->on('organisation_group_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_groups', function(Blueprint $table)
		{
			$table->dropForeign('organisation_groups_ibfk_1');
		});
	}

}
