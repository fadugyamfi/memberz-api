<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleSmsBroadcastListFiltersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_sms_broadcast_list_filters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_sms_broadcast_list_id')->unsigned()->nullable()->index('module_sms_broadcast_list_id');
			$table->string('field')->nullable();
			$table->string('condition', 20)->nullable();
			$table->string('value', 100)->nullable();
			$table->boolean('optional')->nullable()->default(0);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_sms_broadcast_list_filters');
	}

}
