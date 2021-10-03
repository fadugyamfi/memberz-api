<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('payment_types')->delete();

        DB::table('payment_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Credit/Debit Card',
                'code' => 'credit_card',
                'created' => '2015-04-04 00:00:05',
                'modified' => '2015-04-04 00:00:08',
                'active' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Direct Debit',
                'code' => 'direct_debit',
                'created' => '2015-04-04 00:00:19',
                'modified' => '2015-04-04 00:00:23',
                'active' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'MTN Mobile Money',
                'code' => 'mobile_money_mtn',
                'created' => '2015-04-04 00:00:34',
                'modified' => '2015-04-04 00:00:37',
                'active' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Airtel Money',
                'code' => 'mobile_money_airtel',
                'created' => '2015-04-04 00:00:47',
                'modified' => '2015-04-04 00:00:50',
                'active' => 1,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Tigo Cash',
                'code' => 'mobile_money_tigo',
                'created' => '2015-04-04 00:01:00',
                'modified' => '2015-04-04 00:01:04',
                'active' => 1,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Cheque',
                'code' => 'cheque',
                'created' => '2015-04-04 00:01:17',
                'modified' => '2015-04-04 00:01:22',
                'active' => 1,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Cash',
                'code' => 'cash',
                'created' => '2015-04-04 00:01:29',
                'modified' => '2015-04-04 00:01:32',
                'active' => 1,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'MPower Payments',
                'code' => 'mpower',
                'created' => '2015-09-07 03:32:14',
                'modified' => '2015-09-07 03:32:14',
                'active' => 1,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Slydepay',
                'code' => 'slydepay',
                'created' => '2016-06-03 14:33:05',
                'modified' => '2016-06-03 14:33:08',
                'active' => 1,
            ),
        ));


    }
}
