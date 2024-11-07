<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get the name of the original table
        $originalTable = 'organisation_branches';

        // Get the name of the new table
        $newTable = 'organisation_branches_old';

        // Create a copy of the original table with its data
        DB::statement("CREATE TABLE $newTable LIKE $originalTable");
        DB::statement("INSERT INTO $newTable SELECT * FROM $originalTable");

        // Get the name of the original table
        $originalTable = 'organisation_branch_contacts';

        // Get the name of the new table
        $newTable = 'organisation_branch_contacts_old';

        // Create a copy of the original table with its data
        DB::statement("CREATE TABLE $newTable LIKE $originalTable");
        DB::statement("INSERT INTO $newTable SELECT * FROM $originalTable");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisation_branches_old');
        Schema::dropIfExists('organisation_branch_contacts_old');
    }
};
