<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_invoices', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_invoices_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('transaction_type_id', 'organisation_invoices_ibfk_2')->references('id')->on('transaction_types')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('member_account_id', 'organisation_invoices_ibfk_3')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_invoices', function(Blueprint $table)
		{
			$table->dropForeign('organisation_invoices_ibfk_1');
			$table->dropForeign('organisation_invoices_ibfk_2');
			$table->dropForeign('organisation_invoices_ibfk_3');
		});
	}

}
