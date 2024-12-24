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
        Schema::dropIfExists('organisation_branch_contacts');
        Schema::dropIfExists('organisation_branches');

        Schema::create('organisation_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('organisation_id')->index();
            $table->unsignedInteger('branch_organisation_id')->index();
            $table->unsignedInteger('primary_member_id')->nullable()->index()->comment('primary contact person');
            $table->unsignedInteger('secondary_member_id')->nullable()->index()->comment('secondary contact person');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisation_branches');
        Schema::dropIfExists('organisation_branch_contacts');

        // Get the name of the original table
        $originalTable = 'organisation_branches_old';

        // Get the name of the new table
        $newTable = 'organisation_branches';

        // Create a copy of the original table with its data
        DB::statement("CREATE TABLE $newTable LIKE $originalTable");
        DB::statement("INSERT INTO $newTable SELECT * FROM $originalTable");

        // Get the name of the original table
        $originalTable = 'organisation_branch_contacts_old';

        // Get the name of the new table
        $newTable = 'organisation_branch_contacts';

        // Create a copy of the original table with its data
        DB::statement("CREATE TABLE $newTable LIKE $originalTable");
        DB::statement("INSERT INTO $newTable SELECT * FROM $originalTable");
    }
};
