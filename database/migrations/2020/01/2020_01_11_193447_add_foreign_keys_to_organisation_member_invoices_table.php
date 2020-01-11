<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMemberInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_member_invoices', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_member_invoices_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_id', 'organisation_member_invoices_ibfk_3')->references('id')->on('organisation_members')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('transaction_type_id', 'organisation_member_invoices_ibfk_4')->references('id')->on('transaction_types')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_member_invoices', function(Blueprint $table)
		{
			$table->dropForeign('organisation_member_invoices_ibfk_1');
			$table->dropForeign('organisation_member_invoices_ibfk_3');
			$table->dropForeign('organisation_member_invoices_ibfk_4');
		});
	}

}
