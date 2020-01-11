<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationSettingTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('organisation_setting_types')->delete();
        
        DB::table('organisation_setting_types')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'inactivity_delay',
                'description' => 'Minutes of inactivity allowed before auto logout',
                'type' => 'number',
                'default' => '30',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'org_contribution_default_currency',
                'description' => 'Set the default currency that the organization will use',
                'type' => 'select',
                'default' => 'custom',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'org_contribution_receipt_mode',
                'description' => 'Wether the system should handle the receipt manually or automatically',
                'type' => 'select',
                'default' => 'custom',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'org_contribution_receipt_prefix',
                'description' => 'Prefix for organization receipts',
                'type' => 'text',
                'default' => NULL,
            ),
            4 => 
            array (
                'id' => 10,
                'name' => 'org_contribution_receipt_postfix',
                'description' => 'Prefix for organization receipts',
                'type' => 'text',
                'default' => NULL,
            ),
            5 => 
            array (
                'id' => 11,
                'name' => 'org_contribution_receipt_count',
                'description' => 'Organisation receipt counter',
                'type' => 'text',
                'default' => '1',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'auto_birthday_messaging',
                'description' => 'Automatically Send Birthday SMS Messages',
                'type' => 'number',
                'default' => '0',
            ),
            7 => 
            array (
                'id' => 13,
                'name' => 'auto_birthday_message',
                'description' => 'Message to send automatically on birthday',
                'type' => 'text',
                'default' => NULL,
            ),
            8 => 
            array (
                'id' => 14,
                'name' => 'auto_birthday_datetime',
                'description' => 'Time to send automatic birthday messages',
                'type' => 'datetime',
                'default' => NULL,
            ),
            9 => 
            array (
                'id' => 15,
                'name' => 'max_capacity_warning_triggered',
                'description' => 'Indicates the organisation has reached max capacity and been flagged',
                'type' => 'flag',
                'default' => '0',
            ),
        ));
        
        
    }
}