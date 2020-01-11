<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_settings', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_settings_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_setting_type_id', 'organisation_settings_ibfk_2')->references('id')->on('organisation_setting_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_settings', function(Blueprint $table)
		{
			$table->dropForeign('organisation_settings_ibfk_1');
			$table->dropForeign('organisation_settings_ibfk_2');
		});
	}

}
