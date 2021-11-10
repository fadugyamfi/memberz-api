<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganisationRegistrationFormIdToOrganisationMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation_members', function (Blueprint $table) {
            $table->foreignId('organisation_registration_form_id')->nullable()->after('organisation_member_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_members', function (Blueprint $table) {
            $table->dropForeign('organisation_registration_form_id');
        });
    }
}
