<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMemberInvoicePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_member_invoice_payments', function(Blueprint $table)
		{
			$table->foreign('member_account_id', 'organisation_member_invoice_payments_ibfk_3')->references('id')->on('member_accounts')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('organisation_member_invoice_id', 'organisation_member_invoice_payments_ibfk_4')->references('id')->on('organisation_member_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_payment_platform_id', 'organisation_member_invoice_payments_ibfk_5')->references('id')->on('organisation_payment_platforms')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_member_invoice_payments', function(Blueprint $table)
		{
			$table->dropForeign('organisation_member_invoice_payments_ibfk_3');
			$table->dropForeign('organisation_member_invoice_payments_ibfk_4');
			$table->dropForeign('organisation_member_invoice_payments_ibfk_5');
		});
	}

}
