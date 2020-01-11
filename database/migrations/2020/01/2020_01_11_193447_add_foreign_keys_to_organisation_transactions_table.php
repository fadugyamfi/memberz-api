<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_transactions', function(Blueprint $table)
		{
			$table->foreign('transaction_type_id', 'organisation_transactions_ibfk_2')->references('id')->on('transaction_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('organisation_receipt_id', 'organisation_transactions_ibfk_3')->references('id')->on('organisation_receipts')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('member_account_id', 'organisation_transactions_ibfk_4')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('organisation_invoice_id', 'organisation_transactions_ibfk_5')->references('id')->on('organisation_invoices')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_transactions', function(Blueprint $table)
		{
			$table->dropForeign('organisation_transactions_ibfk_2');
			$table->dropForeign('organisation_transactions_ibfk_3');
			$table->dropForeign('organisation_transactions_ibfk_4');
			$table->dropForeign('organisation_transactions_ibfk_5');
		});
	}

}
