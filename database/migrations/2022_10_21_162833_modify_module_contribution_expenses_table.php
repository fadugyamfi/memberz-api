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
        Schema::table('module_contribution_expenses', function(Blueprint $table) {
            $table->dropForeign('module_contribution_expenses_ibfk_8');
            $table->dropColumn(['payment_voucher_id']);
            $table->unsignedBigInteger('expense_request_id')->nullable()->index()->after('expense_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voids
     */
    public function down()
    {
        Schema::table('module_contribution_expenses', function(Blueprint $table) {
            $table->dropColumn(['expense_request_id']);
            $table->unsignedInteger('payment_voucher_id')->nullable()->index()->after('expense_type_id');

            $table->foreign('payment_voucher_id', 'module_contribution_expenses_ibfk_8')
                ->references('id')->on('module_contribution_payment_vouchers')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });

    }
};
