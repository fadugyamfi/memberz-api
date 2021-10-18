<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToModuleContributionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_contribution_types', function (Blueprint $table) {
            $table->dateTime('created')->nullable()->after('system_generated');
            $table->dateTime('modified')->nullable()->after('created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_contribution_types', function (Blueprint $table) {
            $table->dropColumn(['created', 'modified']);
        });
    }
}
