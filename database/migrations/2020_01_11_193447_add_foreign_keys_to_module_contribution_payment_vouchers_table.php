<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleContributionPaymentVouchersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_contribution_payment_vouchers', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_payment_vouchers_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_contribution_payment_vouchers', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_payment_vouchers_ibfk_1');
		});
	}

}
