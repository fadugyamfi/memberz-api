<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleContributionPaymentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('module_contribution_payment_types')->delete();

        DB::table('module_contribution_payment_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Cash',
                'payment_platform_id' => 3,
                'active' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cheque',
                'payment_platform_id' => NULL,
                'active' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'EFT - Mpower',
                'payment_platform_id' => 1,
                'active' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'EFT - Slydepay',
                'payment_platform_id' => 2,
                'active' => 1,
            ),
        ));


    }
}
