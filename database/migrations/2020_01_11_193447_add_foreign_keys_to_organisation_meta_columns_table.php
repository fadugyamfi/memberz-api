<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMetaColumnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_meta_columns', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_meta_columns_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_meta_columns', function(Blueprint $table)
		{
			$table->dropForeign('organisation_meta_columns_ibfk_1');
		});
	}

}
