<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('subscription_types')->delete();
        
        DB::table('subscription_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'free',
                'description' => 'Free Tier',
                'capacity' => 50,
                'validity' => 'forever',
                'currency_id' => 80,
                'initial_price' => 0.0,
                'renewal_price' => 0.0,
                'billing_required' => 'no',
                'initial_sms_credit' => 5,
                'monthly_sms_bonus' => 0,
                'accounts' => 2,
                'reporting' => 'basic',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-05-18 08:41:23',
                'modified' => '2017-09-22 18:46:12',
                'promotional' => 0,
                'active' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'starter',
                'description' => 'Starter Plan',
                'capacity' => 500,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 100.0,
                'renewal_price' => 100.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 200,
                'monthly_sms_bonus' => 200,
                'accounts' => 5,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 1,
                'created' => '2015-05-18 08:41:44',
                'modified' => '2017-09-22 18:46:14',
                'promotional' => 0,
                'active' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'pro',
                'description' => 'Pro Plan',
                'capacity' => 2000,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 300.0,
                'renewal_price' => 300.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 1000,
                'monthly_sms_bonus' => 1000,
                'accounts' => 15,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-05-18 08:41:41',
                'modified' => '2017-09-22 18:46:16',
                'promotional' => 0,
                'active' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'medium',
                'description' => 'Star Plan',
                'capacity' => 3000,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 500.0,
                'renewal_price' => 500.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 1500,
                'monthly_sms_bonus' => 1500,
                'accounts' => 20,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-05-18 07:41:37',
                'modified' => '2017-09-22 18:46:17',
                'promotional' => 0,
                'active' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'large',
                'description' => 'Deluxe Plan',
                'capacity' => 5000,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 800.0,
                'renewal_price' => 800.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 2500,
                'monthly_sms_bonus' => 2500,
                'accounts' => 25,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-05-18 08:41:34',
                'modified' => '2017-09-22 18:46:18',
                'promotional' => 0,
                'active' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'extra_large',
                'description' => 'Platinum Plan',
                'capacity' => 10000,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 999.0,
                'renewal_price' => 999.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 5000,
                'monthly_sms_bonus' => 5000,
                'accounts' => 30,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-05-18 08:41:30',
                'modified' => '2017-09-22 18:46:19',
                'promotional' => 0,
                'active' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'enterprise',
                'description' => 'Enterprise',
                'capacity' => 100000,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 9999.0,
                'renewal_price' => 9999.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 5000,
                'monthly_sms_bonus' => 5000,
                'accounts' => 100,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-05-22 20:52:24',
                'modified' => '2017-09-22 18:46:20',
                'promotional' => 0,
                'active' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'basic',
                'description' => 'Basic Plan',
                'capacity' => 1000,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 175.0,
                'renewal_price' => 175.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 500,
                'monthly_sms_bonus' => 500,
                'accounts' => 10,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-06-25 10:08:24',
                'modified' => '2019-03-08 22:53:10',
                'promotional' => 0,
                'active' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'mini',
                'description' => 'Mini Plan',
                'capacity' => 300,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 50.0,
                'renewal_price' => 50.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 100,
                'monthly_sms_bonus' => 100,
                'accounts' => 3,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-07-13 10:13:32',
                'modified' => '2017-09-22 18:46:22',
                'promotional' => 0,
                'active' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'xmas15_3x',
                'description' => 'X\'mas 2015 Package',
                'capacity' => 150,
                'validity' => 'forever',
                'currency_id' => 80,
                'initial_price' => 0.0,
                'renewal_price' => 0.0,
                'billing_required' => 'no',
                'initial_sms_credit' => 50,
                'monthly_sms_bonus' => 0,
                'accounts' => 3,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2015-11-30 17:54:00',
                'modified' => '2017-09-22 18:46:25',
                'promotional' => 1,
                'active' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'free2',
                'description' => 'Free Plan',
                'capacity' => 150,
                'validity' => 'forever',
                'currency_id' => 80,
                'initial_price' => 0.0,
                'renewal_price' => 0.0,
                'billing_required' => 'no',
                'initial_sms_credit' => 25,
                'monthly_sms_bonus' => 0,
                'accounts' => 5,
                'reporting' => 'advanced',
                'revenue_tracking' => 0,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2017-07-15 13:36:51',
                'modified' => '2017-09-26 10:51:51',
                'promotional' => 0,
                'active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'sms_pro',
                'description' => 'Basic Plan',
                'capacity' => 99999,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 49.0,
                'renewal_price' => 49.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 100,
                'monthly_sms_bonus' => 100,
                'accounts' => 10,
                'reporting' => 'advanced',
                'revenue_tracking' => 0,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 0,
                'created' => '2017-07-15 13:42:56',
                'modified' => '2017-09-23 22:43:19',
                'promotional' => 0,
                'active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'pro2',
                'description' => 'Pro Plan',
                'capacity' => 99999,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 149.0,
                'renewal_price' => 149.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 250,
                'monthly_sms_bonus' => 250,
                'accounts' => 100,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 0,
                'events' => 1,
                'featured' => 1,
                'created' => '2017-07-15 13:46:13',
                'modified' => '2017-09-23 22:43:18',
                'promotional' => 0,
                'active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'premium',
                'description' => 'Premium Plan',
                'capacity' => 99999,
                'validity' => 'monthly',
                'currency_id' => 80,
                'initial_price' => 299.0,
                'renewal_price' => 299.0,
                'billing_required' => 'yes',
                'initial_sms_credit' => 500,
                'monthly_sms_bonus' => 500,
                'accounts' => 100,
                'reporting' => 'advanced',
                'revenue_tracking' => 1,
                'expenditure_tracking' => 1,
                'events' => 1,
                'featured' => 0,
                'created' => '2017-07-15 13:49:25',
                'modified' => '2017-08-24 14:23:23',
                'promotional' => 0,
                'active' => 0,
            ),
        ));
        
        
    }
}