<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleContributionReportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('module_contribution_reports')->delete();
        
        DB::table('module_contribution_reports')->insert(array (
            0 => 
            array (
                'id' => 1,
                'organisation_id' => NULL,
                'name' => 'Income Summary',
                'description' => 'Get all transactions by date range and group by contibution types',
                'type' => 'predefined',
                'query_file' => 'transaction_summary.sql',
                'view_file' => 'transaction_summary',
                'created' => NULL,
                'modified' => NULL,
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'organisation_id' => NULL,
                'name' => 'Monthly Consolidated Report',
                'description' => 'All consolidated monthly transcations by contributions types and payment type',
                'type' => 'predefined',
                'query_file' => 'monthly_consolidated.sql',
                'view_file' => 'monthly_consolidated',
                'created' => NULL,
                'modified' => NULL,
                'active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'organisation_id' => NULL,
                'name' => 'Monthly Consolidated Details',
                'description' => 'Monthly Consolidated Details',
                'type' => 'predefined',
                'query_file' => 'monthly_consolidated_details.sql',
                'view_file' => 'monthly_consolidated_details',
                'created' => NULL,
                'modified' => NULL,
                'active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'organisation_id' => NULL,
                'name' => 'Top Contributors',
                'description' => 'Top Contributors For Year',
                'type' => 'predefined',
                'query_file' => 'top_contributors.sql',
                'view_file' => 'top_contributors',
                'created' => NULL,
                'modified' => NULL,
                'active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'organisation_id' => NULL,
                'name' => 'Non Contributing Members',
                'description' => 'Members Who Currently Do Not Contribute',
                'type' => 'predefined',
                'query_file' => 'non_contributing.sql',
                'view_file' => 'non_contributors',
                'created' => NULL,
                'modified' => NULL,
                'active' => 1,
            ),
        ));
        
        
    }
}