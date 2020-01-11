<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToModuleMemberContributionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('module_member_contributions', function(Blueprint $table)
		{
			$table->foreign('organisation_member_id', 'module_member_contributions_ibfk_1')->references('id')->on('organisation_members')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_contribution_type_id', 'module_member_contributions_ibfk_2')->references('id')->on('module_contribution_types')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('module_contribution_receipt_id', 'module_member_contributions_ibfk_3')->references('id')->on('module_contribution_receipts')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('bank_id', 'module_member_contributions_ibfk_4')->references('id')->on('banks')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('organisation_file_import_id', 'module_member_contributions_ibfk_5')->references('id')->on('organisation_file_imports')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('module_member_contributions', function(Blueprint $table)
		{
			$table->dropForeign('module_member_contributions_ibfk_1');
			$table->dropForeign('module_member_contributions_ibfk_2');
			$table->dropForeign('module_member_contributions_ibfk_3');
			$table->dropForeign('module_member_contributions_ibfk_4');
			$table->dropForeign('module_member_contributions_ibfk_5');
		});
	}

}
