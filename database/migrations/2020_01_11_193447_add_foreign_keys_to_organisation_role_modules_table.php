<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationRoleModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_role_modules', function(Blueprint $table)
		{
			$table->foreign('organisation_role_id', 'organisation_role_modules_ibfk_1')->references('id')->on('organisation_roles')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_role_modules', function(Blueprint $table)
		{
			$table->dropForeign('organisation_role_modules_ibfk_1');
		});
	}

}
