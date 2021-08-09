<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMembershipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_memberships', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_member_id')->unsigned()->nullable()->index('organisation_member_id');
			$table->integer('organisation_member_category_id')->unsigned()->nullable()->index('organisation_member_category_id');
			$table->integer('organisation_member_invoice_id')->unsigned()->nullable()->index('organisation_memberships_ibfk_4');
			$table->float('price', 10)->nullable();
			$table->float('discount_offered', 10)->nullable();
			$table->float('total_due', 10)->nullable();
			$table->dateTime('membership_start_dt')->nullable();
			$table->dateTime('membership_end_dt')->nullable();
			$table->boolean('current')->nullable()->default(0);
			$table->boolean('paid')->nullable()->default(0);
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_memberships');
	}

}
