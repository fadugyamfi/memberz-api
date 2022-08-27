<?php

namespace Database\Seeders\Tests;

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MemberTestSeeder::class);
        $this->call(OrganisationTestSeeder::class);
        $this->call(ContributionTestSeeder::class);
        $this->call(EventTestSeeder::class);
    }
}
