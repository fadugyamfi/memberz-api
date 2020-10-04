<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_receipt_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('organisation_invoice_id')->unsigned()->nullable()->index('organisation_invoice_id');
			$table->integer('transaction_type_id')->unsigned()->nullable()->index('transaction_type_id');
			$table->float('cash_amount', 10)->nullable();
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id')->comment('User who triggered the transaction');
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
		Schema::drop('organisation_transactions');
	}

}
