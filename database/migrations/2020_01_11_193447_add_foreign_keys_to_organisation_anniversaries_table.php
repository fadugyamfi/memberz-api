<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationAnniversariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_anniversaries', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_anniversaries_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_anniversaries', function(Blueprint $table)
		{
			$table->dropForeign('organisation_anniversaries_ibfk_1');
		});
	}

}
