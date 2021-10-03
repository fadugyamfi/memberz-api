<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_branches', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('organisation_id')->unsigned()->index();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('lft')->nullable()->unsigned();
            $table->integer('rght')->nullable()->unsigned();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamp('modified')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_branches');
    }
}
