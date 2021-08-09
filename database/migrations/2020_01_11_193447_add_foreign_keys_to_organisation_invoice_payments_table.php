<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationInvoicePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_invoice_payments', function(Blueprint $table)
		{
			$table->foreign('organisation_invoice_id', 'organisation_invoice_payments_ibfk_1')->references('id')->on('organisation_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('payment_type_id', 'organisation_invoice_payments_ibfk_2')->references('id')->on('payment_types')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('member_account_id', 'organisation_invoice_payments_ibfk_3')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_invoice_payments', function(Blueprint $table)
		{
			$table->dropForeign('organisation_invoice_payments_ibfk_1');
			$table->dropForeign('organisation_invoice_payments_ibfk_2');
			$table->dropForeign('organisation_invoice_payments_ibfk_3');
		});
	}

}
