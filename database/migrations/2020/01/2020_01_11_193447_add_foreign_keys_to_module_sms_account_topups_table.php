<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleSmsAccountTopupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_sms_account_topups', function(Blueprint $table)
		{
			$table->foreign('module_sms_account_id', 'module_sms_account_topups_1')->references('id')->on('module_sms_accounts')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('organisation_invoice_id', 'module_sms_account_topups_2')->references('id')->on('organisation_invoices')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('module_sms_credit_id', 'module_sms_account_topups_3')->references('id')->on('module_sms_credits')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('module_sms_account_id', 'module_sms_account_topups_ibfk_2')->references('id')->on('module_sms_accounts')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('organisation_invoice_id', 'module_sms_account_topups_ibfk_3')->references('id')->on('organisation_invoices')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('module_sms_credit_id', 'module_sms_account_topups_ibfk_4')->references('id')->on('module_sms_credits')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_sms_account_topups', function(Blueprint $table)
		{
			$table->dropForeign('module_sms_account_topups_1');
			$table->dropForeign('module_sms_account_topups_2');
			$table->dropForeign('module_sms_account_topups_3');
			$table->dropForeign('module_sms_account_topups_ibfk_2');
			$table->dropForeign('module_sms_account_topups_ibfk_3');
			$table->dropForeign('module_sms_account_topups_ibfk_4');
		});
	}

}
