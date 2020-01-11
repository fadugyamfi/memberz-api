<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMemberInvoicePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_member_invoice_payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_member_invoice_id')->unsigned()->nullable()->index('organisation_invoice_id');
			$table->integer('organisation_payment_platform_id')->unsigned()->nullable()->index('payment_type_id');
			$table->float('amount', 10)->nullable();
			$table->text('notes', 65535)->nullable();
			$table->date('payment_date')->nullable();
			$table->string('payee_name', 100)->nullable();
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
			$table->string('transaction_id', 64)->nullable()->index('transaction_id');
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
		Schema::drop('organisation_member_invoice_payments');
	}

}
