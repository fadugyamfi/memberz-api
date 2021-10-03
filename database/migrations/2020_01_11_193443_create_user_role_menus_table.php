<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUserRoleMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_role_menus', function(Blueprint $table)
		{
			$table->unsignedInteger('id', true);
			$table->unsignedInteger('user_role_id')->nullable()->index('user_role_fk');
			$table->unsignedInteger('menu_id')->nullable()->index('usr_menu_id')->comment('References the Manager Categories item');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_role_menus');
	}

}
