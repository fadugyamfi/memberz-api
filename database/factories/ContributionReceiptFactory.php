<?php

namespace Database\Factories;

use App\Models\Organisation;
use App\Models\OrganisationAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContributionReceipt>
 */
class ContributionReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organisation_id' => Organisation::factory(),
            'receipt_no' => fake()->numberBetween(1000, 10000),
            'receipt_dt' => fake()->date(),
            'organisation_account_id' => OrganisationAccount::factory()
        ];
    }
}
