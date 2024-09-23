<?php

namespace Database\Factories;

use App\Models\Contribution;
use App\Models\ContributionReceipt;
use App\Models\ContributionType;
use App\Models\Organisation;
use App\Models\OrganisationMember;
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
            'organisation_id' => Organisation::factory(),
            'organisation_member_id' => OrganisationMember::factory(),
            'module_contribution_type_id' => ContributionType::factory(), 
            'module_contribution_receipt_id' => ContributionReceipt::factory(),
            'description' => 'A generated contribution',
            'week' => fake()->numberBetween(1, 5),
            'month' => fake()->month(),
            'year' => fake()->year(),
            'module_contribution_payment_type_id' => 1,
            'cheque_status' => null,
            'cheque_number' => null,
            'bank_id' => null,
            'amount' => fake()->numberBetween(100, 10000),
            'currency_id' => 80,
            'organisation_file_import_id' => null,
        ];
    }
}
