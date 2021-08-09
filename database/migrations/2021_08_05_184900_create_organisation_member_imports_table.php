<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationMemberImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_member_imports', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('organisation_id')->index();
            $table->unsignedInteger('organisation_file_import_id')->index();
            $table->unsignedInteger('organisation_member_id')->index();
            $table->string('import_type', 100)->nullable()->index()->comment('linked, imported, existing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_member_imports');
    }
}
