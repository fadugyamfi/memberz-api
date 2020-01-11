<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMemberMedicalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_member_medicals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned();
			$table->integer('member_id')->unsigned();
			$table->string('blood_group', 5)->nullable();
			$table->float('weight', 10);
			$table->string('weight_unit', 5);
			$table->float('height', 10)->nullable();
			$table->string('height_unit', 5)->nullable();
			$table->enum('blood_pressure', array('High','Medium','Low'))->nullable();
			$table->string('blood_pressure_value', 10)->nullable();
			$table->string('notes')->nullable();
			$table->enum('feels_dizzy', array('Y','N'));
			$table->enum('feels_faint', array('Y','N'));
			$table->enum('has_heart_condition', array('Y','N'));
			$table->enum('has_chest_pain', array('Y','N'));
			$table->enum('has_asthma', array('Y','N'));
			$table->enum('has_diabetes', array('Y','N'));
			$table->enum('has_short_breath', array('Y','N'));
			$table->enum('has_epilepsy', array('Y','N'));
			$table->enum('has_joint_issues', array('Y','N'));
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_member_medicals');
	}

}
