<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_contribution_payment_vouchers', function(Blueprint $table)
		{
			$table->dropForeign('module_contribution_payment_vouchers_ibfk_1');
		});

        Schema::dropIfExists('module_contribution_payment_vouchers');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('module_contribution_payment_vouchers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->string('voucher_no', 30)->nullable();
			$table->dateTime('payment_dt')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
			$table->index(['voucher_no','payment_dt'], 'voucher_no');
		});

        Schema::table('module_contribution_payment_vouchers', function(Blueprint $table)
		{
			$table->foreign('organisation_id', 'module_contribution_payment_vouchers_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
    }
};
