<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleContributionReportFiltersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('module_contribution_report_filters')->delete();

        DB::table('module_contribution_report_filters')->insert(array (
            0 =>
            array (
                'id' => 1,
                'module_contribution_report_id' => 4,
                'field' => 'ModuleMemberContribution.organisation_member_id',
                'condition' => '=',
                'value' => 'ghppp',
                'optional' => 0,
                'created' => '2015-05-06 15:18:47',
                'modified' => '2015-05-08 14:54:47',
                'active' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'module_contribution_report_id' => 6,
                'field' => 'ModuleContributionReceipt.receipt_no',
                'condition' => '=',
                'value' => '23344',
                'optional' => 0,
                'created' => '2015-05-08 14:56:39',
                'modified' => '2015-05-08 14:56:39',
                'active' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'module_contribution_report_id' => 7,
                'field' => 'ModuleMemberContribution.year',
                'condition' => '=',
                'value' => '2016',
                'optional' => 0,
                'created' => '2015-05-08 14:59:31',
                'modified' => '2015-05-08 14:59:31',
                'active' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'module_contribution_report_id' => 8,
                'field' => 'ModuleMemberContribution.month',
                'condition' => '=',
                'value' => '2',
                'optional' => 0,
                'created' => '2015-05-08 15:08:38',
                'modified' => '2015-05-08 15:10:38',
                'active' => 1,
            ),
        ));


    }
}
