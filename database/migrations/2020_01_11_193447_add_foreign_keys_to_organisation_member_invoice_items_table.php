<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationMemberInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_member_invoice_items', function(Blueprint $table)
		{
			$table->foreign('organisation_member_invoice_id', 'organisation_member_invoice_items_ibfk_1')->references('id')->on('organisation_member_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_member_invoice_items', function(Blueprint $table)
		{
			$table->dropForeign('organisation_member_invoice_items_ibfk_1');
		});
	}

}
