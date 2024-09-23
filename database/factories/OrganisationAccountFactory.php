<?php

namespace Database\Factories;

use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrganisationAccount>
 */
class OrganisationAccountFactory extends Factory
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
            'member_account_id' => MemberAccount::factory(),
            'organisation_role_id' => OrganisationRole::factory()
        ];
    }
}
