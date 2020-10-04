<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('modules')->delete();

        DB::table('modules')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Reports',
                'description' => 'Reports Module',
                'controller' => 'reports',
                'action' => 'index',
                'arguments' => NULL,
                'icon' => 'fa-file-text',
                'default_active' => 1,
                'add_to_menu' => 1,
                'menu_position' => 2,
                'created' => '2014-11-14 21:32:30',
                'modified' => '2014-11-14 21:32:33',
                'active' => 0,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Messages',
                'description' => 'SMS Module',
                'controller' => 'sms',
                'action' => 'index',
                'arguments' => NULL,
                'icon' => 'fa-envelope',
                'default_active' => 1,
                'add_to_menu' => 1,
                'menu_position' => 3,
                'created' => '2014-11-14 21:32:55',
                'modified' => '2014-11-14 21:32:58',
                'active' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Finance',
                'description' => 'Finance Module',
                'controller' => 'contributions',
                'action' => 'home',
                'arguments' => NULL,
                'icon' => 'fa-money',
                'default_active' => 1,
                'add_to_menu' => 1,
                'menu_position' => 4,
                'created' => '2014-11-14 21:33:24',
                'modified' => '2014-11-14 21:33:26',
                'active' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Settings',
                'description' => 'Settings',
                'controller' => 'settings',
                'action' => 'general',
                'arguments' => NULL,
                'icon' => 'fa-cog',
                'default_active' => 0,
                'add_to_menu' => 0,
                'menu_position' => 5,
                'created' => '2015-01-23 11:24:55',
                'modified' => '2015-01-23 11:24:59',
                'active' => 0,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Members',
                'description' => 'Membership Management',
                'controller' => 'organisation',
                'action' => 'members',
                'arguments' => NULL,
                'icon' => 'fa-users',
                'default_active' => 1,
                'add_to_menu' => 1,
                'menu_position' => 1,
                'created' => '2015-01-28 00:35:59',
                'modified' => '2015-01-28 00:36:02',
                'active' => 1,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Events',
                'description' => 'Events',
                'controller' => 'events',
                'action' => 'dashboard',
                'arguments' => NULL,
                'icon' => 'fa-calendar',
                'default_active' => 1,
                'add_to_menu' => 1,
                'menu_position' => 2,
                'created' => '2015-11-16 12:01:51',
                'modified' => '2015-11-16 12:01:54',
                'active' => 1,
            ),
        ));


    }
}
