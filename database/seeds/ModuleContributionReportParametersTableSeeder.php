<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleContributionReportParametersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('module_contribution_report_parameters')->delete();
        
        DB::table('module_contribution_report_parameters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'module_contribution_report_id' => 1,
                'parameter' => 'start_date',
                'created' => '2015-05-06 08:58:26',
                'modified' => '2015-05-06 08:58:30',
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'module_contribution_report_id' => 1,
                'parameter' => 'end_date',
                'created' => '2015-05-06 08:58:46',
                'modified' => '2015-05-06 08:58:49',
                'active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'module_contribution_report_id' => 1,
                'parameter' => 'currency',
                'created' => '2015-05-06 08:59:05',
                'modified' => '2015-05-06 08:59:07',
                'active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'module_contribution_report_id' => 2,
                'parameter' => 'year',
                'created' => '2015-05-06 09:04:18',
                'modified' => '2015-05-06 09:04:21',
                'active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'module_contribution_report_id' => 2,
                'parameter' => 'currency',
                'created' => '2015-05-06 09:04:06',
                'modified' => '2015-05-06 09:04:08',
                'active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'module_contribution_report_id' => 3,
                'parameter' => 'year',
                'created' => '2015-05-06 09:07:04',
                'modified' => '2015-05-06 09:07:07',
                'active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'module_contribution_report_id' => 3,
                'parameter' => 'currency',
                'created' => '2015-05-06 09:07:22',
                'modified' => '2015-05-06 09:07:24',
                'active' => 1,
            ),
            7 => 
            array (
                'id' => 9,
                'module_contribution_report_id' => 4,
                'parameter' => 'year',
                'created' => '2017-07-29 23:15:18',
                'modified' => '2017-07-29 23:15:22',
                'active' => 1,
            ),
            8 => 
            array (
                'id' => 10,
                'module_contribution_report_id' => 4,
                'parameter' => 'currency',
                'created' => '2017-07-29 23:15:56',
                'modified' => '2017-07-29 23:15:59',
                'active' => 1,
            ),
            9 => 
            array (
                'id' => 11,
                'module_contribution_report_id' => 5,
                'parameter' => 'year',
                'created' => '2017-07-30 00:25:25',
                'modified' => '2017-07-30 00:25:29',
                'active' => 1,
            ),
        ));
        
        
    }
}