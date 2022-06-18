<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class AddUuidToRegistrationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation_registration_forms', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id')->index();
            $table->string('slug', 191)->nullable()->after('uuid')->index();
            $table->unsignedInteger('organisation_member_category_id')->after('organisation_id')->index('membership_category_idx');
        });

        DB::table('organisation_registration_forms')->latest()->chunk(100, function($forms) {
            foreach($forms as $form) {
                DB::table('organisation_registration_forms')
                    ->where('id', $form->id)
                    ->update([
                        'uuid' => Str::uuid(),
                        'slug' => Str::kebab($form->name)
                    ]);
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
        Schema::table('organisation_registration_forms', function (Blueprint $table) {
            $table->dropIndex(['uuid', 'slug', 'organisation_member_category_id']);
            $table->dropColumn(['uuid', 'slug', 'organisation_member_category_id']);
        });
    }
}
