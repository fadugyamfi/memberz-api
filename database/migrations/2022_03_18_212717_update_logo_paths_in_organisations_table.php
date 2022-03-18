<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLogoPathsInOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('organisations')->whereNotNull('logo')->update([
            'logo' => DB::raw("REPLACE(logo, 'https://memberz.org/files', 'https://files.memberz.org')")
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('organisations')->whereNotNull('logo')->update([
            'logo' => DB::raw("REPLACE(logo, 'https://files.memberz.org', 'https://memberz.org/files')")
        ]);
    }
}
