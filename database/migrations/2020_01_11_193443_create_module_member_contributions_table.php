<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateModuleMemberContributionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_member_contributions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0)->index('organisation_id');
			$table->integer('organisation_member_id')->unsigned()->nullable()->index('member_id');
			$table->integer('module_contribution_type_id')->unsigned()->nullable()->index('organisation_contribution_type_id');
			$table->integer('module_contribution_receipt_id')->unsigned()->nullable()->index('module_member_contributions_ibfk_3');
			$table->string('description', 150)->nullable()->default('Description of the payment if not member specific');
			$table->integer('week')->nullable();
			$table->integer('month')->nullable();
			$table->integer('year')->nullable();
			$table->integer('module_contribution_payment_type_id')->nullable()->default(1);
			$table->enum('cheque_status', array('Not Cleared','Cleared'))->nullable()->default('Not Cleared');
			$table->string('cheque_number', 11)->nullable()->default('');
			$table->smallInteger('bank_id')->unsigned()->nullable()->index('bank_id');
			$table->float('amount', 10)->nullable();
			$table->integer('currency_id')->unsigned()->nullable();
			$table->integer('organisation_file_import_id')->unsigned()->nullable()->index('organisation_file_import_id');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->index(['organisation_id','cheque_number','bank_id'], 'cheque_number');
			$table->index(['organisation_id','year','month','week'], 'year');
			$table->index(['organisation_id','description'], 'organisation_id_2');
			$table->index(['organisation_id','created','module_contribution_type_id'], 'organisation_id_3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('module_member_contributions');
	}

}
