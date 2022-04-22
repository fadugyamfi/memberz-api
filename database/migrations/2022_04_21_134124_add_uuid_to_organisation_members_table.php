<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddUuidToOrganisationMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation_members', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id')->unique();
        });

        DB::table('organisation_members')->orderBy('id')->chunk(500, function($memberships) {
            foreach($memberships as $membership) {
                DB::table('organisation_members')->where('id', $membership->id)->update(['uuid' => Str::uuid()]);
            }
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
            $table->dropUnique(['uuid']);
            $table->dropColumn(['uuid']);
        });
    }
}
