<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('system_setting_categories')->delete();

        DB::table('system_setting_categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'General Settings',
                'created' => NULL,
                'modified' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Features',
                'created' => NULL,
                'modified' => NULL,
            ),
        ));


    }
}
