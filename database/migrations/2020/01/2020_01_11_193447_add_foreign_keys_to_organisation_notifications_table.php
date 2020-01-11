<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_notifications', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_notifications_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('notification_type_id', 'organisation_notifications_ibfk_2')->references('id')->on('notification_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_notifications', function(Blueprint $table)
		{
			$table->dropForeign('organisation_notifications_ibfk_1');
			$table->dropForeign('organisation_notifications_ibfk_2');
		});
	}

}
