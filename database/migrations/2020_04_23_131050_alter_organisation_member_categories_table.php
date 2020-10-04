<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrganisationMemberCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation_member_categories', function (Blueprint $table) {
            $table->integer('parent_id')->nullable()->unsigned()->after('organisation_id');
            $table->integer('lft')->nullable()->unsigned()->after('parent_id');
            $table->integer('rght')->nullable()->unsigned()->after('lft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_member_categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('lft');
            $table->dropColumn('rght');
        });
    }
}
