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
        $member = Member::firstOrCreate([
            'first_name' => 'Test',
            'last_name' => 'Member',
            'mobile_number' => '+233277593003',
            'email' => 'test.member@memberz.org'
        ],[
            'dob' => now()->subYears(18)->format('Y-m-d'),
            'gender' => 'male',
            'marital_status' => 'single'
        ]);

        Member::firstOrCreate([
            'first_name' => 'Married',
            'last_name' => 'Member',
            'mobile_number' => '+233277593003',
            'email' => 'married@memberz.org'
        ],[
            'dob' => now()->subYears(35)->format('Y-m-d'),
            'gender' => 'male',
            'marital_status' => 'married'
        ]);

        MemberAccount::firstOrcreate([
            'username' => $member->email,
        ],[
            'member_id' => $member->id,
            'password' => bcrypt('memberz1234'),
            'mobile_number' => $member->mobile_number
        ]);
    }
}
