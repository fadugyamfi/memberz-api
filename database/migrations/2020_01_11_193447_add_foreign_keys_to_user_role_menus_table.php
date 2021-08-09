<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToUserRoleMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_role_menus', function(Blueprint $table)
		{
			$table->foreign('user_role_id', 'user_role_menus_ibfk_1')->references('id')->on('user_roles')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('menu_id', 'user_role_menus_ibfk_2')->references('id')->on('module_menus')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_role_menus', function(Blueprint $table)
		{
			$table->dropForeign('user_role_menus_ibfk_1');
			$table->dropForeign('user_role_menus_ibfk_2');
		});
	}

}
