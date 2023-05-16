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
        Schema::create('expense_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('organisation_id');
            $table->date('request_dt');
            $table->string('voucher_no')->nullable()->index();
            $table->unsignedInteger('currency_id')->index();
            $table->double('amount', 10, 2);
            $table->unsignedInteger('requested_by_id')->nullable()->index()->comment('organisation_member_id making request');
            $table->unsignedInteger('approved_by_id')->nullable()->index()->comment('organisation_member_id approving request');
            $table->datetime('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_requests');
    }
};
