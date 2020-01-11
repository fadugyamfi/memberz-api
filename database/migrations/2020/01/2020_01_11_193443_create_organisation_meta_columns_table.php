<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMetaColumnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_meta_columns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->string('name', 50)->nullable();
			$table->enum('type', array('text','number','date','options'))->nullable();
			$table->string('default_value')->nullable();
			$table->text('options_list', 65535)->nullable();
			$table->boolean('show_on_reg_forms')->nullable()->default(0);
			$table->boolean('required')->nullable()->default(0);
			$table->smallInteger('sort_order')->unsigned()->nullable()->default(0);
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
		Schema::drop('organisation_meta_columns');
	}

}
