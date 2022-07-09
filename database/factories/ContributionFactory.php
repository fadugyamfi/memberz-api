<?php

namespace Database\Factories;

use App\Models\Contribution;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContributionFactory extends Factory
{

    public $model = Contribution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'organisation_id',
            // 'organisation_member_id',
            // 'module_contribution_type_id',
            // 'module_contribution_receipt_id',
            // 'description',
            // 'week',
            // 'month',
            // 'year',
            // 'module_contribution_payment_type_id',
            // 'cheque_status',
            // 'cheque_number',
            // 'bank_id',
            // 'amount',
            // 'currency_id',
            // 'organisation_file_import_id',
            // 'created',
            // 'modified',
            // 'active'
        ];
    }
}
