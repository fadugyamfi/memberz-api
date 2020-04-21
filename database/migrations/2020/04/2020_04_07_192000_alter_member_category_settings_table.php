<?php

use App\Models\MemberCategorySetting;
use App\Models\Organisation;
use App\Models\OrganisationMemberCategorySetting;
use App\Models\OrganisationSetting;
use App\Models\OrganisationSettingType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterMemberCategorySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        // // Schema::table('member_category_settings', function(Blueprint $table) {
		// // 	$table->text('default')->change();
        // // });

        // // Schema::table('organisation_member_category_settings', function(Blueprint $table)
		// // {
		// // 	$table->text('value')->change();
        // // });

        // Schema::table('organisation_setting_types', function(Blueprint $table) {
        //     $table->text('default')->change();

        //     if( !Schema::hasColumns('organisation_setting_types', ['created', 'modified']) ) {
        //         $table->datetime('created')->nullable();
        //         $table->dateTime('modified')->nullable()->useCurrent();
        //     }
        // });

        // Schema::table('organisation_settings', function(Blueprint $table)
		// {
		// 	$table->text('value')->change();
        // });

        // $this->createSettings();
    }

    private function createSettings() {
        // MemberCategorySetting::create([
        //     'name' => 'column_display',
        //     'description' => 'Columns And Order Of Display When Viewing Profiles',
        //     'type' => 'text',
        //     'default' => '[
        //         {"column": "id", "field": "organisation_members.organisation_no", "display_name": "ID #"},
        //         {"column": "name", "field": "members.full_name", "display_name": "Name"},
        //         {"column": "email", "field": "members.email", "display_name": "Email"},
        //         {"column": "mobile_number", "field": "members.mobile_number", "display_name": "Phone Number"}
        //     ]'
        // ]);

        $orgSettingType = OrganisationSettingType::create([
            'name' => 'column_display',
            'description' => 'Columns And Order Of Display When Viewing Profiles',
            'type' => 'text',
            'default' => '[
                {"column": "id", "field": "organisation_members.organisation_no", "display_name": "ID #"},
                {"column": "name", "field": "members.full_name", "display_name": "Name"},
                {"column": "email", "field": "members.email", "display_name": "Email"},
                {"column": "mobile_number", "field": "members.mobile_number", "display_name": "Phone Number"}
            ]'
        ]);

        $organisation_ids = Organisation::select('id')->get()->pluck('id')->all();
        foreach($organisation_ids as $organisation_id) {
            OrganisationSetting::create([
                'organisation_id' => $organisation_id,
                'organisation_setting_type_id' => $orgSettingType->id,
                'value' => $orgSettingType->default
            ]);
        }
    }

    private function removeSettings() {
        // $setting = MemberCategorySetting::where('name', 'column_display')->first();
        // if( $setting ) {
        //     OrganisationMemberCategorySetting::where('member_category_setting_id', $setting->id)->delete();
        //     $setting->delete();
        // }

        $orgSettingType = OrganisationSettingType::where('name', 'column_display')->first();
        if( $orgSettingType ) {
            OrganisationSetting::where('organisation_setting_type_id', $orgSettingType->id)->delete();
            $orgSettingType->delete();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        // $this->removeSettings();

        // // Schema::table('organisation_member_category_settings', function(Blueprint $table)
		// // {
		// // 	$table->string('value', 255)->change();
        // // });

        // // Schema::table('member_category_settings', function(Blueprint $table)
		// // {
        // //     $table->string('default', 255)->change();
        // // });

        // Schema::table('organisation_setting_types', function(Blueprint $table)
		// {
        //     $table->string('default', 255)->change();
        //     $table->dropColumn(['created', 'modified']);
        // });

        // Schema::table('organisation_settings', function(Blueprint $table)
		// {
        //     $table->string('value', 255)->change();
        // });
    }
}
