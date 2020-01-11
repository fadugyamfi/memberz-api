<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationNotificationParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_notification_params', function(Blueprint $table)
		{
			$table->foreign('organisation_notification_id', 'organisation_notification_params_ibfk_1')->references('id')->on('organisation_notifications')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_notification_params', function(Blueprint $table)
		{
			$table->dropForeign('organisation_notification_params_ibfk_1');
		});
	}

}
