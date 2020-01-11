<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 20)->nullable();
			$table->string('first_name', 50)->nullable();
			$table->string('middle_name', 50)->nullable();
			$table->string('last_name', 50)->nullable();
			$table->string('maiden_name', 50)->nullable();
			$table->string('gender', 6)->nullable();
			$table->date('dob')->nullable()->index('member_dob');
			$table->string('place_of_birth', 40)->nullable();
			$table->string('nationality', 50)->nullable();
			$table->string('marital_status', 50)->nullable();
			$table->string('address', 200)->nullable();
			$table->string('home_number', 30)->nullable();
			$table->string('mobile_number', 30)->nullable()->index('mobile_number');
			$table->string('office_number', 30)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('website', 50)->nullable();
			$table->string('social_security_no', 50)->nullable();
			$table->string('employment_status', 30)->nullable();
			$table->string('occupation')->nullable();
			$table->string('position', 40)->nullable();
			$table->string('profession', 40)->nullable();
			$table->string('field_of_study', 50)->nullable();
			$table->string('educational_bg', 50)->nullable();
			$table->string('home_town', 40)->nullable();
			$table->string('tribe', 40)->nullable();
			$table->string('residential_address', 100)->nullable();
			$table->string('residential_city', 30)->nullable();
			$table->string('residential_region', 30)->nullable();
			$table->string('residential_district', 100)->nullable();
			$table->string('residential_zip_code', 10)->nullable();
			$table->string('business_name', 100)->nullable();
			$table->string('business_address', 100)->nullable();
			$table->string('business_city', 30)->nullable();
			$table->string('business_region', 30)->nullable();
			$table->string('business_district', 100)->nullable();
			$table->string('business_zip_code', 10)->nullable();
			$table->string('bank', 40)->nullable();
			$table->string('bank_acc_no', 40)->nullable();
			$table->string('bank_branch', 50)->nullable();
			$table->string('bank_location', 100)->nullable();
			$table->boolean('is_orphan')->nullable()->default(0);
			$table->enum('status', array('active','dormant','past','deceased','visitor'))->nullable()->default('active');
			$table->integer('source_organisation_id')->unsigned()->nullable()->index('source_organisation_id');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->index(['last_name','first_name','middle_name'], 'member_names');
			$table->index(['email','active'], 'email');
			$table->index(['first_name','middle_name','last_name','mobile_number','email'], 'search_group');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
