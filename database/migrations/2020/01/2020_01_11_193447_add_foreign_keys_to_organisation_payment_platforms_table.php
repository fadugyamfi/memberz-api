<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationPaymentPlatformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_payment_platforms', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'organisation_payment_platforms_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('payment_platform_id', 'organisation_payment_platforms_ibfk_2')->references('id')->on('payment_platforms')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('currency_id', 'organisation_payment_platforms_ibfk_3')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('country_id', 'organisation_payment_platforms_ibfk_4')->references('id')->on('countries')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_payment_platforms', function(Blueprint $table)
		{
			$table->dropForeign('organisation_payment_platforms_ibfk_1');
			$table->dropForeign('organisation_payment_platforms_ibfk_2');
			$table->dropForeign('organisation_payment_platforms_ibfk_3');
			$table->dropForeign('organisation_payment_platforms_ibfk_4');
		});
	}

}
