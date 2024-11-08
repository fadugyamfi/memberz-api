<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Organisation;
use App\Models\OrganisationMemberCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrganisationMember>
 */
class OrganisationMemberFactory extends Factory
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
            'member_id' => Member::factory(),
            'organisation_member_category_id' => OrganisationMemberCategory::factory()
        ];
    }
}
