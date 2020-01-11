<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_subscriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->boolean('subscription_type_id')->nullable()->index('subscription_type_id');
			$table->integer('organisation_invoice_id')->unsigned()->nullable()->index('organisation_subscriptions_ibfk_3');
			$table->dateTime('start_dt')->nullable();
			$table->dateTime('end_dt')->nullable();
			$table->boolean('length')->nullable()->default(1);
			$table->boolean('current')->nullable()->default(1);
			$table->dateTime('last_renewal_notice_dt')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->primary(['id','organisation_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_subscriptions');
	}

}
