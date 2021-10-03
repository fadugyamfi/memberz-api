<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationReceiptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_receipts', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_receipts_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('payment_type_id', 'organisation_receipts_ibfk_2')->references('id')->on('payment_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_receipts', function(Blueprint $table)
		{
			$table->dropForeign('organisation_receipts_ibfk_1');
			$table->dropForeign('organisation_receipts_ibfk_2');
		});
	}

}
