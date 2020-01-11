<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberCategorySettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('member_category_settings')->delete();
        
        DB::table('member_category_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'additional_profile_info',
                'description' => 'Collect Additional Profile Information',
                'type' => 'flag',
                'default' => '1',
                'position' => 2,
                'created' => '2014-06-11 22:46:15',
                'modified' => '2014-06-11 22:46:19',
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'location_info',
                'description' => 'Collect Member Location Information',
                'type' => 'flag',
                'default' => '1',
                'position' => 3,
                'created' => '2014-06-11 22:46:15',
                'modified' => '2014-06-11 22:46:15',
                'active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'family_info',
                'description' => 'Collect Nuclear Family Information',
                'type' => 'flag',
                'default' => '0',
                'position' => 4,
                'created' => '2014-06-11 22:46:15',
                'modified' => '2014-06-11 22:46:15',
                'active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'group_info',
                'description' => 'Associate Members With groups',
                'type' => 'flag',
                'default' => '1',
                'position' => 5,
                'created' => '2014-06-11 22:46:15',
                'modified' => '2014-06-11 22:46:15',
                'active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'anniversary_info',
                'description' => 'Collect Anniversary Information',
                'type' => 'flag',
                'default' => '1',
                'position' => 6,
                'created' => '2014-06-11 22:46:15',
                'modified' => '2014-06-11 22:46:15',
                'active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'notes',
                'description' => 'Take Short Notes About Members',
                'type' => 'flag',
                'default' => '0',
                'position' => 7,
                'created' => '2014-06-11 22:46:15',
                'modified' => '2014-06-11 22:46:15',
                'active' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'add_type_label',
                'description' => 'Membership Type Label.  e.g. Applicant',
                'type' => 'text',
                'default' => 'Member',
                'position' => 1,
                'created' => '2014-06-12 02:29:32',
                'modified' => '2014-06-12 02:29:35',
                'active' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'activity_feed',
                'description' => 'Show Memberships In Activity Feed',
                'type' => 'flag',
                'default' => '1',
                'position' => 8,
                'created' => '2014-06-18 13:59:34',
                'modified' => '2014-06-18 13:59:38',
                'active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'birthdays',
                'description' => 'Show Memberships In Birthday Feed',
                'type' => 'flag',
                'default' => '1',
                'position' => 9,
                'created' => '2015-04-30 10:22:00',
                'modified' => '2015-04-30 10:22:02',
                'active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'medical_info',
                'description' => 'Collect Medical History Information',
                'type' => 'flag',
                'default' => '0',
                'position' => 10,
                'created' => '2016-01-13 16:17:31',
                'modified' => '2016-01-13 16:17:31',
                'active' => 0,
            ),
        ));
        
        
    }
}