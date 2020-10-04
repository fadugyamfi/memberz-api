<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_invoice_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_invoice_id')->unsigned()->nullable()->index('organisation_invoice_id');
			$table->smallInteger('qty')->nullable();
			$table->enum('product_type', array('subscription','sms_credit'))->nullable();
			$table->integer('product_id')->unsigned()->nullable()->index('product_id');
			$table->string('description')->nullable();
			$table->float('unit_price', 10)->nullable();
			$table->float('tax_amount', 10)->nullable();
			$table->float('gross_total', 10)->nullable();
			$table->float('total', 10)->nullable();
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
		Schema::drop('organisation_invoice_items');
	}

}
