<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('setting_types')->delete();

        DB::table('setting_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'max_login_retries',
                'description' => 'Max login attempts before lockout',
                'type' => 'number',
                'default' => '3',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'inactivity_delay',
                'description' => 'Minutes of inactivity allowed before auto logout',
                'type' => 'number',
                'default' => '10',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'discoverable',
                'description' => 'Allow members to find organisation publicly',
                'type' => 'flag',
                'default' => '0',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'allow_public_join',
                'description' => 'Allow members to join organisation through public interface',
                'type' => 'flag',
                'default' => '0',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'receipt_no_counter',
                'description' => 'Counter that keeps record of receipts created',
                'type' => 'number',
                'default' => '1',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'receipt_no_prefix',
                'description' => 'A prefix a for receipt numbers',
                'type' => 'text',
                'default' => NULL,
            ),
        ));


    }
}
