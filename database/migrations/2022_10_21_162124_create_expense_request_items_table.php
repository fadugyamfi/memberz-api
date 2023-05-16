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
        Schema::create('expense_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('organisation_id')->index();
            $table->unsignedInteger('expense_request_id')->index();
            $table->string('description');
            $table->unsignedInteger('currency_id')->index();
            $table->integer('quantity')->default(1);
            $table->double('unit_price', 10, 2);
            $table->double('total', 10, 2);
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
        Schema::dropIfExists('expense_request_items');
    }
};
