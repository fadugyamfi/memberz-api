<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleSmsBroadcastListContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_sms_broadcast_list_contacts', function(Blueprint $table)
		{
			$table->foreign('module_sms_broadcast_list_id', 'module_sms_broadcast_list_contacts_ibfk_1')->references('id')->on('module_sms_broadcast_lists')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('member_id', 'module_sms_broadcast_list_contacts_ibfk_2')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_sms_broadcast_list_contacts', function(Blueprint $table)
		{
			$table->dropForeign('module_sms_broadcast_list_contacts_ibfk_1');
			$table->dropForeign('module_sms_broadcast_list_contacts_ibfk_2');
		});
	}

}
