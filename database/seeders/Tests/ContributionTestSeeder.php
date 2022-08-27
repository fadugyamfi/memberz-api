<?php

namespace Database\Seeders\Tests;

use App\Models\Contribution;
use App\Models\ContributionPaymentType;
use App\Models\ContributionReceipt;
use App\Models\ContributionType;
use App\Models\Organisation;
use Illuminate\Database\Seeder;

class ContributionTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisation = Organisation::find(1);

        $receipt = ContributionReceipt::create([
            'organisation_id' => $organisation->id,
            'receipt_no' => '1',
            'receipt_dt' => date('Y-m-d'),
            'active' => 1
        ]);

        $contributionType = ContributionType::create([
            'organisation_id' => $organisation->id,
            'name' => 'Test Type',
            'member_required' => 'Not Required',
            'currency_id' => 80
        ]);

        Contribution::create([
            'organisation_id' => $organisation->id,
            'organisation_member_id' => $organisation->organisationMembers()->first()->id,
            'module_contribution_type_id' => $contributionType->id,
            'module_contribution_receipt_id' => $receipt->id,
            'description' => 'Test Payment',
            'week' => 1,
            'month' => 1,
            'year' => date('Y'),
            'module_contribution_payment_type_id' => ContributionPaymentType::find(1)->id,
            // 'cheque_status',
            // 'cheque_number',
            // 'bank_id',
            'amount' => 100,
            'currency_id' => 80,
            // 'organisation_file_import_id',
            // 'created',
            // 'modified',
            'active' => 1
        ]);
    }
}
