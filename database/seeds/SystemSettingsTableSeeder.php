<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('system_settings')->delete();
        
        DB::table('system_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'setting_type_category_id' => 1,
                'name' => 'maintenance_mode',
                'type' => 'flag',
                'description' => 'Enable this mode to turn off the application completely',
                'value' => '0',
                'created' => '2015-04-29 17:32:06',
                'modified' => '2015-04-30 17:43:04',
            ),
            1 => 
            array (
                'id' => 2,
                'setting_type_category_id' => 1,
                'name' => 'enterprise_mode',
                'type' => 'flag',
                'description' => 'Enable this mode to treat application as an Enterprise package, with branches instead of organisations.',
                'value' => '0',
                'created' => '2015-04-29 17:32:40',
                'modified' => '2015-04-30 17:43:03',
            ),
            2 => 
            array (
                'id' => 3,
                'setting_type_category_id' => 2,
                'name' => 'organisation_paid_memberships',
                'type' => 'flag',
                'description' => 'Enable this feature to allow organisations to create paid memberships and charge members money.',
                'value' => '0',
                'created' => '2015-04-29 17:39:43',
                'modified' => '2015-05-23 09:14:36',
            ),
            3 => 
            array (
                'id' => 4,
                'setting_type_category_id' => 1,
                'name' => 'max_login_retries',
                'type' => 'number',
                'description' => 'Set the number of login retries permitted before a user account is locked to prevent brute force attacks',
                'value' => '5',
                'created' => '2015-04-30 17:24:52',
                'modified' => '2015-04-30 17:42:59',
            ),
            4 => 
            array (
                'id' => 5,
                'setting_type_category_id' => 2,
                'name' => 'organisation_activity_feed',
                'type' => 'flag',
                'description' => 'Enable this feature to display organisation activity feed',
                'value' => '1',
                'created' => '2015-04-30 17:43:59',
                'modified' => '2015-04-30 17:44:02',
            ),
            5 => 
            array (
                'id' => 6,
                'setting_type_category_id' => 2,
                'name' => 'organisation_birthday_notifications',
                'type' => 'flag',
                'description' => 'Enable this feature to show a section for birthdays in an organisation',
                'value' => '1',
                'created' => '2015-04-30 17:44:51',
                'modified' => '2015-04-30 17:44:53',
            ),
            6 => 
            array (
                'id' => 7,
                'setting_type_category_id' => 2,
                'name' => 'accept_mpower_payments',
                'type' => 'flag',
                'description' => 'Enable this feature accept payments via the MPower Platform',
                'value' => '0',
                'created' => '2016-06-04 06:04:24',
                'modified' => '2017-05-25 14:57:19',
            ),
            7 => 
            array (
                'id' => 8,
                'setting_type_category_id' => 2,
                'name' => 'accept_slydepay_payments',
                'type' => 'flag',
                'description' => 'Enable this feature to accept payments via Slydepay',
                'value' => '1',
                'created' => '2016-06-04 06:06:01',
                'modified' => '2017-05-25 14:57:20',
            ),
        ));
        
        
    }
}