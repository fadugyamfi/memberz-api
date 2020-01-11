<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('organisation_types')->delete();
        
        DB::table('organisation_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Religious Organisation',
                'organisation_count' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Non-Profit Organisation',
                'organisation_count' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Business',
                'organisation_count' => 0,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'School',
                'organisation_count' => 0,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Association',
                'organisation_count' => 0,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Non-Governmental Organisation',
                'organisation_count' => 0,
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Political Organisation',
                'organisation_count' => 0,
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Travel / Leisure',
                'organisation_count' => 0,
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Bank / Financial Institution',
                'organisation_count' => 0,
            ),
        ));
        
        
    }
}