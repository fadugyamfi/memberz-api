<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToMemberImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_images', function(Blueprint $table)
		{
			$table->foreign('member_id', 'member_images_ibfk_1')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_images', function(Blueprint $table)
		{
			$table->dropForeign('member_images_ibfk_1');
		});
	}

}
