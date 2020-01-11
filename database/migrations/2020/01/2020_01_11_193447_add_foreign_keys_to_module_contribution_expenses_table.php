<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_expenses', function(Blueprint $table)
		{
			$table->foreign('organisation_file_import_id', 'module_contribution_expenses_ibfk_5')->references('id')->on('organisation_file_imports')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('organisation_id', 'module_contribution_expenses_ibfk_6')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('expense_type_id', 'module_contribution_expenses_ibfk_7')->references('id')->on('module_contribution_expense_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('payment_voucher_id', 'module_contribution_expenses_ibfk_8')->references('id')->on('module_contribution_payment_vouchers')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('currency_id', 'module_contribution_expenses_ibfk_9')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_expenses', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_expenses_ibfk_5');
			$table->dropForeign('module_contribution_expenses_ibfk_6');
			$table->dropForeign('module_contribution_expenses_ibfk_7');
			$table->dropForeign('module_contribution_expenses_ibfk_8');
			$table->dropForeign('module_contribution_expenses_ibfk_9');
		});
	}

}
