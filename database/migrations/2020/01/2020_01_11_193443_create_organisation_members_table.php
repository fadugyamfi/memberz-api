<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->string('organisation_no', 50)->nullable();
			$table->integer('organisation_member_category_id')->unsigned()->nullable()->index('organisation_members_ibfk_8');
			$table->enum('status', array('member','visitor','deceased'))->nullable()->default('member');
			$table->enum('source', array('public','admin','registration'))->nullable()->default('admin');
			$table->dateTime('membership_start_dt')->nullable();
			$table->dateTime('membership_end_dt')->nullable();
			$table->dateTime('last_renewal_dt')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('approved')->nullable()->default(1);
			$table->integer('approved_by')->unsigned()->nullable()->index('organisation_members_ibfk_7');
			$table->boolean('active')->nullable()->default(1);
			$table->index(['organisation_no','organisation_id','organisation_member_category_id'], 'organisation_no');
			$table->primary(['id','organisation_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_members');
	}

}
