<?php

namespace Database\Factories;

use App\Models\OrganisationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisation>
 */
class OrganisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(50),
            'organisation_type_id' => OrganisationType::inRandomOrder()->first()?->id ?? 1,
            'country_id' => 80,
        ];
    }
}
