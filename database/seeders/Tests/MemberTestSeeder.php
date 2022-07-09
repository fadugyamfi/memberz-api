<?php

namespace Database\Seeders\Tests;

use App\Models\Member;
use App\Models\MemberAccount;
use Illuminate\Database\Seeder;

class MemberTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = Member::create([
            'first_name' => 'Test',
            'last_name' => 'Member',
            'dob' => now()->subYears(18)->format('Y-m-d'),
            'gender' => 'male',
            'mobile_number' => '+233277593003',
            'email' => 'test.member@memberz.org'
        ]);

        $memberAccount = MemberAccount::create([
            'member_id' => $member->id,
            'username' => $member->email,
            'password' => bcrypt('memberz1234'),
            'mobile_number' => $member->mobile_number
        ]);
    }
}
