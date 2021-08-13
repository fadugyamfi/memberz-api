<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberRelationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_relation_types')->delete();
        DB::table('member_relation_types')->insert([
            ['id' => 1, 'name' => 'Child'],
            ['id' => 2, 'name' => 'Parent'],
            ['id' => 3, 'name' => 'Spouse']
        ]);
    }
}
