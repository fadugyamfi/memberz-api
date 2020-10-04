<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationBranchContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_branch_contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('organisation_id')->unsigned()->index();
            $table->bigInteger('organisation_branch_id')->unsigned()->index();
            $table->integer('member_id')->unsigned()->index();
            $table->boolean('primary')->default(false)->nullable();
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
        Schema::dropIfExists('organisation_branch_contacts');
    }
}
