<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('module_menus')->delete();
        
        DB::table('module_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'module_id' => 2,
                'display_name' => 'Messages',
                'controller' => 'sms',
                'action' => 'index#messages',
                'arguments' => NULL,
                'icon' => 'fa-envelope',
                'position' => 1,
                'created' => '2014-12-01 23:15:34',
                'modified' => '2014-12-01 23:15:37',
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'module_id' => 2,
                'display_name' => 'Broadcast',
                'controller' => 'sms',
                'action' => 'index#broadcast',
                'arguments' => NULL,
                'icon' => 'fa-share-alt',
                'position' => 2,
                'created' => '2014-12-01 23:16:05',
                'modified' => '2014-12-01 23:16:08',
                'active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'module_id' => 2,
                'display_name' => 'Manage Lists',
                'controller' => 'sms',
                'action' => 'index#broadcast_lists',
                'arguments' => NULL,
                'icon' => 'fa-list',
                'position' => 3,
                'created' => '2014-12-01 23:16:51',
                'modified' => '2014-12-01 23:16:54',
                'active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'module_id' => 3,
                'display_name' => 'Income',
                'controller' => 'contributions',
                'action' => 'income',
                'arguments' => NULL,
                'icon' => 'fa-inbox',
                'position' => 2,
                'created' => '2014-12-03 10:55:50',
                'modified' => '2014-12-03 10:55:56',
                'active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'module_id' => 3,
                'display_name' => 'Bulk Upload',
                'controller' => 'import',
                'action' => 'contributions',
                'arguments' => NULL,
                'icon' => 'fa-upload',
                'position' => 5,
                'created' => '2014-12-03 11:07:11',
                'modified' => '2014-12-03 11:07:17',
                'active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'module_id' => 3,
                'display_name' => 'Settings',
                'controller' => 'contributions',
                'action' => 'settings',
                'arguments' => NULL,
                'icon' => 'fa-gear',
                'position' => 6,
                'created' => '2014-12-03 11:09:18',
                'modified' => '2014-12-03 11:09:21',
                'active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'module_id' => 5,
                'display_name' => 'Profiles',
                'controller' => 'organisation',
                'action' => 'members',
                'arguments' => NULL,
                'icon' => 'fa-user',
                'position' => 1,
                'created' => '2015-01-28 01:03:42',
                'modified' => '2015-01-28 01:03:45',
                'active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'module_id' => 5,
                'display_name' => 'Groups',
                'controller' => 'organisation',
                'action' => 'groups',
                'arguments' => NULL,
                'icon' => 'fa-users',
                'position' => 2,
                'created' => '2015-01-28 01:04:12',
                'modified' => '2015-01-28 01:04:15',
                'active' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'module_id' => 5,
                'display_name' => 'Photos',
                'controller' => 'organisation',
                'action' => 'images',
                'arguments' => NULL,
                'icon' => 'fa-picture-o',
                'position' => 3,
                'created' => '2015-01-28 01:05:03',
                'modified' => '2015-01-28 01:05:06',
                'active' => 1,
            ),
            9 => 
            array (
                'id' => 11,
                'module_id' => 3,
                'display_name' => 'Reports',
                'controller' => 'contributions',
                'action' => 'report',
                'arguments' => NULL,
                'icon' => 'fa-bar-chart-o',
                'position' => 7,
                'created' => '2015-04-30 21:06:20',
                'modified' => '2015-04-30 21:06:23',
                'active' => 1,
            ),
            10 => 
            array (
                'id' => 15,
                'module_id' => 5,
                'display_name' => 'Bulk Import',
                'controller' => 'import',
                'action' => 'members',
                'arguments' => NULL,
                'icon' => 'fa-upload',
                'position' => 4,
                'created' => '2015-07-01 02:55:30',
                'modified' => '2015-07-01 02:55:34',
                'active' => 1,
            ),
            11 => 
            array (
                'id' => 16,
                'module_id' => 6,
                'display_name' => 'Dashboard',
                'controller' => 'events',
                'action' => 'dashboard',
                'arguments' => NULL,
                'icon' => 'fa-line-chart',
                'position' => 1,
                'created' => '2015-11-16 12:04:16',
                'modified' => '2015-11-16 12:04:19',
                'active' => 0,
            ),
            12 => 
            array (
                'id' => 17,
                'module_id' => 6,
                'display_name' => 'Calendar',
                'controller' => 'events',
                'action' => 'calendar',
                'arguments' => NULL,
                'icon' => 'fa-calendar',
                'position' => 2,
                'created' => '2015-11-16 12:06:38',
                'modified' => '2015-11-16 12:06:41',
                'active' => 1,
            ),
            13 => 
            array (
                'id' => 18,
                'module_id' => 6,
                'display_name' => 'Reports',
                'controller' => 'events',
                'action' => 'reports',
                'arguments' => NULL,
                'icon' => 'fa-check-square-o',
                'position' => 3,
                'created' => '2015-11-16 12:06:38',
                'modified' => '2015-11-16 12:06:41',
                'active' => 1,
            ),
            14 => 
            array (
                'id' => 19,
                'module_id' => 3,
                'display_name' => 'Expenditure',
                'controller' => 'finance',
                'action' => 'expenditure',
                'arguments' => NULL,
                'icon' => 'fa-money',
                'position' => 3,
                'created' => '2016-02-09 11:40:00',
                'modified' => '2016-02-09 11:40:05',
                'active' => 0,
            ),
            15 => 
            array (
                'id' => 20,
                'module_id' => 3,
                'display_name' => 'Dashboard',
                'controller' => 'contributions',
                'action' => 'home',
                'arguments' => NULL,
                'icon' => 'fa-dashboard',
                'position' => 1,
                'created' => '2016-02-09 11:49:48',
                'modified' => '2016-02-09 11:49:52',
                'active' => 1,
            ),
            16 => 
            array (
                'id' => 21,
                'module_id' => 6,
                'display_name' => 'Registrations',
                'controller' => 'events',
                'action' => 'registrations',
                'arguments' => NULL,
                'icon' => 'fa-pencil',
                'position' => 4,
                'created' => '2016-04-26 10:12:47',
                'modified' => '2016-04-26 10:12:52',
                'active' => 0,
            ),
            17 => 
            array (
                'id' => 22,
                'module_id' => 2,
                'display_name' => 'Settings',
                'controller' => 'sms',
                'action' => 'index#settings',
                'arguments' => NULL,
                'icon' => 'fa-cog',
                'position' => 5,
                'created' => '2016-05-03 23:46:52',
                'modified' => '2016-05-03 23:46:55',
                'active' => 1,
            ),
            18 => 
            array (
                'id' => 23,
                'module_id' => 5,
                'display_name' => 'Reports',
                'controller' => 'reports',
                'action' => 'index',
                'arguments' => NULL,
                'icon' => 'fa-file-text',
                'position' => 4,
                'created' => '2016-07-25 16:14:03',
                'modified' => '2016-07-25 16:14:06',
                'active' => 1,
            ),
            19 => 
            array (
                'id' => 24,
                'module_id' => 3,
                'display_name' => 'Pledges',
                'controller' => 'pledges',
                'action' => 'index',
                'arguments' => NULL,
                'icon' => 'fa-credit-card',
                'position' => 4,
                'created' => '2017-02-19 19:51:03',
                'modified' => '2017-02-19 19:51:06',
                'active' => 1,
            ),
            20 => 
            array (
                'id' => 25,
                'module_id' => 6,
                'display_name' => 'Upcoming',
                'controller' => 'events',
                'action' => 'upcoming',
                'arguments' => NULL,
                'icon' => 'fa-list',
                'position' => 2,
                'created' => '2017-07-27 20:08:46',
                'modified' => '2017-07-27 20:08:49',
                'active' => 1,
            ),
        ));
        
        
    }
}