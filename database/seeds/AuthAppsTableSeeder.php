<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthAppsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('auth_apps')->delete();
        
        DB::table('auth_apps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'app_id' => 'memberz',
                'app_key' => '$2a$10$GQHl1FrM6USx3bJ5QyrE7eveM9baKCE34V1iqyjppGPHTHdA0Ichm',
                'name' => 'Memberz.Org Website',
                'description' => 'Main Memberz.Org Website',
                'organisation_id' => 21,
                'all_access' => 1,
                'created' => '2017-11-09 20:34:15',
                'modified' => '2017-11-09 20:34:15',
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'app_id' => 'iipgh_website',
                'app_key' => '$2a$10$OHACXuzyIKiHm6nJ8V5zgeiYm45Ck7uPLBRDTcXKm1Dk00yp0MIQi',
                'name' => 'IIPGH Website',
                'description' => 'IIPGH Sign Up Integration',
                'organisation_id' => 194,
                'all_access' => 0,
                'created' => '2017-11-09 20:23:14',
                'modified' => '2017-11-09 20:23:14',
                'active' => 1,
            ),
        ));
        
        
    }
}