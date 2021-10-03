<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMembershipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_memberships', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_memberships_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_id', 'organisation_memberships_ibfk_2')->references('id')->on('organisation_members')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_category_id', 'organisation_memberships_ibfk_3')->references('id')->on('organisation_member_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_invoice_id', 'organisation_memberships_ibfk_4')->references('id')->on('organisation_member_invoices')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_memberships', function(Blueprint $table)
		{
			$table->dropForeign('organisation_memberships_ibfk_1');
			$table->dropForeign('organisation_memberships_ibfk_2');
			$table->dropForeign('organisation_memberships_ibfk_3');
			$table->dropForeign('organisation_memberships_ibfk_4');
		});
	}

}
