<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationSettingTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_setting_types', function(Blueprint $table)
		{
			$table->smallInteger('id', true);
			$table->string('name', 50)->nullable();
			$table->string('description', 200)->nullable();
			$table->enum('type', array('flag','number','date','text','datetime','email','select','url'))->nullable();
			$table->string('default', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_setting_types');
	}

}
