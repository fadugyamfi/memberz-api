<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemberAccount>
 */
class MemberAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $member = Member::factory()->create();
        
        return [
            'member_id' => $member?->id,
            'username' => $member->email,
            'mobile_number' => $member->mobile_number,
            'password' => Hash::make('123456')
        ];
    }
}
