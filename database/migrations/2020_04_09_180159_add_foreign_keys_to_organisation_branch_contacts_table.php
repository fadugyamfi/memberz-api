<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrganisationBranchContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation_branch_contacts', function (Blueprint $table) {
            $table->foreign('organisation_id', 'organisation_branch_contacts_ibfk_1')->references('id')->on('organisations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('organisation_branch_id', 'organisation_branch_contacts_ibfk_2')->references('id')->on('organisation_branches')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('member_id', 'organisation_branch_contacts_ibfk_3')->references('id')->on('members')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_branch_contacts', function (Blueprint $table) {
            $table->dropForeign('organisation_branch_contacts_ibfk_1');
            $table->dropForeign('organisation_branch_contacts_ibfk_2');
            $table->dropForeign('organisation_branch_contacts_ibfk_3');
        });
    }
}
