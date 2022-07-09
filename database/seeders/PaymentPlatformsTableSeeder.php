<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PaymentPlatformsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('payment_platforms')->delete();

        DB::table('payment_platforms')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'MPower Payments',
                'description' => 'MPower Payments Solution',
                'method_name' => 'mpower',
                'config_keys' => 'Master Key, Public Key, Private Key, Token, Store Name, Tag Line, Phone Number, Postal Address',
                'logo' => 'payment_platforms/mpower.png',
                'instructions' => 'You will be redirected to the MPower Payments website to complete the transaction for this payment. You can pay with either a Credit/Debit Card, Mobile Money or via your MPower Mobile Wallet.',
                'created' => '2016-02-17 00:08:13',
                'modified' => '2016-02-17 00:08:18',
                'deleted' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Slydepay',
                'description' => 'Slydepay Payments Solution',
                'method_name' => 'slydepay',
                'config_keys' => 'Merchant Email, Merchant Key',
                'logo' => 'payment_platforms/slydepay.png',
                'instructions' => 'You will be redirected to the Slydepay payment portal to complete the transaction for this payment. You can pay with either a Credit/Debit Card, Mobile Money or your Slydepay Mobile Wallet.',
                'created' => '2016-06-02 08:13:25',
                'modified' => '2016-06-02 08:13:29',
                'deleted' => 0,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Cash Payment',
                'description' => 'Physical Cash Payments',
                'method_name' => 'cash',
                'config_keys' => NULL,
                'logo' => 'payment_platforms/cash.png',
                'instructions' => NULL,
                'created' => '2017-11-25 19:07:33',
                'modified' => '2017-11-25 19:07:36',
                'deleted' => 0,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'iPay',
                'description' => 'iPay Ghana',
                'method_name' => 'ipay',
                'config_keys' => 'Merchant Key',
                'logo' => 'payment_platforms/ipay.png',
                'instructions' => NULL,
                'created' => '2018-01-08 15:38:24',
                'modified' => '2018-01-08 15:38:27',
                'deleted' => 0,
            ),
        ));


    }
}
