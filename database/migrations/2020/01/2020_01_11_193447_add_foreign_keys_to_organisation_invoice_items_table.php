<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_invoice_items', function(Blueprint $table)
		{
			$table->foreign('organisation_invoice_id', 'organisation_invoice_items_ibfk_1')->references('id')->on('organisation_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_invoice_items', function(Blueprint $table)
		{
			$table->dropForeign('organisation_invoice_items_ibfk_1');
		});
	}

}
