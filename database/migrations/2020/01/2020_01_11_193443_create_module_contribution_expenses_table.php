<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleContributionExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_contribution_expenses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('year');
			$table->integer('expense_type_id')->unsigned()->nullable()->index('organisation_contribution_type_id');
			$table->integer('payment_voucher_id')->unsigned()->nullable()->index('module_member_contributions_ibfk_3');
			$table->integer('organisation_member_id')->unsigned()->nullable()->index('member_id');
			$table->string('description', 150)->nullable()->default('Description of the payment if not member specific');
			$table->integer('account_id')->unsigned()->nullable()->default(1);
			$table->string('cheque_number', 11)->nullable()->default('');
			$table->float('amount', 10)->nullable();
			$table->integer('currency_id')->nullable()->index('currency_id');
			$table->integer('organisation_file_import_id')->unsigned()->nullable()->index('organisation_file_import_id');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->index(['organisation_id','created','expense_type_id'], 'organisation_id_3');
			$table->primary(['id','organisation_id']);
			$table->index(['organisation_id','description'], 'organisation_id_2');
			$table->index(['organisation_id','cheque_number'], 'cheque_number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_contribution_expenses');
	}

}
