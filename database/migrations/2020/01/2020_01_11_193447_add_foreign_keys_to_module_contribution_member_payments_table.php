<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionMemberPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_member_payments', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_member_payments_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_member_invoice_id', 'module_contribution_member_payments_ibfk_2')->references('id')->on('organisation_member_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_member_contribution_id', 'module_contribution_member_payments_ibfk_3')->references('id')->on('module_member_contributions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_member_payments', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_member_payments_ibfk_1');
			$table->dropForeign('module_contribution_member_payments_ibfk_2');
			$table->dropForeign('module_contribution_member_payments_ibfk_3');
		});
	}

}
