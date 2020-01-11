<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_menus', function(Blueprint $table)
		{
			$table->foreign('module_id', 'module_menus_ibfk_1')->references('id')->on('modules')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_menus', function(Blueprint $table)
		{
			$table->dropForeign('module_menus_ibfk_1');
		});
	}

}
