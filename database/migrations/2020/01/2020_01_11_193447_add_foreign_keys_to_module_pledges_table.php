<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModulePledgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_pledges', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_pledges_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_id', 'module_pledges_ibfk_3')->references('id')->on('organisation_members')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_pledge_type_id', 'module_pledges_ibfk_4')->references('id')->on('module_pledge_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_pledges', function(Blueprint $table)
		{
			$table->dropForeign('module_pledges_ibfk_1');
			$table->dropForeign('module_pledges_ibfk_3');
			$table->dropForeign('module_pledges_ibfk_4');
		});
	}

}
