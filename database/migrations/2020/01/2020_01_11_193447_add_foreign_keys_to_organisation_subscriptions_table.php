<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddForeignKeysToOrganisationSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisation_subscriptions', function(Blueprint $table)
		{
			$table->foreign('subscription_type_id', 'organisation_subscriptions_ibfk_1')->references('id')->on('subscription_types')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('organisation_id', 'organisation_subscriptions_ibfk_2')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('organisation_invoice_id', 'organisation_subscriptions_ibfk_3')->references('id')->on('organisation_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('organisation_subscriptions', function(Blueprint $table)
		{
			$table->dropForeign('organisation_subscriptions_ibfk_1');
			$table->dropForeign('organisation_subscriptions_ibfk_2');
			$table->dropForeign('organisation_subscriptions_ibfk_3');
		});
	}

}
