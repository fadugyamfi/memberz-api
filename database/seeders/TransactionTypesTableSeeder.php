<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('transaction_types')->delete();

        DB::table('transaction_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'group' => 'organisation',
                'name' => 'SMS Credit Topup',
                'member_can_cancel' => 0,
                'created' => '2015-04-01 13:14:20',
                'modified' => '2015-04-01 13:14:24',
                'active' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'group' => 'organisation',
                'name' => 'Subscription Purchase',
                'member_can_cancel' => 0,
                'created' => '2015-06-01 13:33:46',
                'modified' => '2015-06-01 13:33:49',
                'active' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'group' => 'organisation',
                'name' => 'Subscription Upgrade',
                'member_can_cancel' => 0,
                'created' => '2015-09-02 16:36:15',
                'modified' => '2015-09-02 16:36:18',
                'active' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'group' => 'organisation',
                'name' => 'Subscription Renewal',
                'member_can_cancel' => 0,
                'created' => '2015-09-02 16:36:29',
                'modified' => '2015-09-02 16:36:32',
                'active' => 1,
            ),
            4 =>
            array (
                'id' => 5,
                'group' => 'member',
                'name' => 'Membership Fee',
                'member_can_cancel' => 0,
                'created' => '2016-03-07 20:27:58',
                'modified' => '2016-03-07 20:28:02',
                'active' => 1,
            ),
            5 =>
            array (
                'id' => 6,
                'group' => 'member',
                'name' => 'Event Registration',
                'member_can_cancel' => 0,
                'created' => '2016-03-07 20:28:05',
                'modified' => '2016-03-07 20:28:09',
                'active' => 1,
            ),
            6 =>
            array (
                'id' => 7,
                'group' => 'member',
                'name' => 'Contribution Payment',
                'member_can_cancel' => 1,
                'created' => '2016-03-07 20:28:12',
                'modified' => '2016-03-07 20:28:16',
                'active' => 1,
            ),
        ));


    }
}
