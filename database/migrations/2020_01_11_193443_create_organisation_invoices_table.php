<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('transaction_type_id')->unsigned()->nullable()->index('transaction_type_id');
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
			$table->string('invoice_no', 40)->nullable()->unique('invoice_no');
			$table->boolean('paid')->nullable()->default(0);
			$table->integer('currency_id')->nullable();
			$table->float('total_due', 10)->nullable()->default(0.00);
			$table->dateTime('due_date')->nullable();
			$table->text('notes', 65535)->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
			$table->integer('deleted_by')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_invoices');
	}

}
