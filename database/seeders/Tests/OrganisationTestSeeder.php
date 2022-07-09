<?php

namespace Database\Seeders\Tests;

use App\Models\Member;
use App\Models\Organisation;
use App\Models\OrganisationAccount;
use App\Models\OrganisationMember;
use App\Models\OrganisationMemberCategory;
use App\Models\OrganisationType;
use Illuminate\Database\Seeder;

class OrganisationTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisationType = OrganisationType::find(1);
        $member = Member::find(1);

        $organisation = Organisation::create([
            'name' => 'Test Organisation',
            'organisation_type_id' => $organisationType->id,
            'member_account_id' => $member->memberAccount->id
        ]);

        // $orgAccount = OrganisationAccount::create([
        //     'organisation_id' => $organisation->id,
        //     'member_account_id' => $member->memberAccount->id
        // ]);

        // $membershipCategory = OrganisationMemberCategory::create([
        //     'organisation_id' => $organisation->id,
        //     'name' => 'Members'
        // ]);

        $membershipCategory = OrganisationMemberCategory::first();

        $membership = OrganisationMember::create([
            'organisation_id' => $organisation->id,
            'organisation_member_category_id' => $membershipCategory->id,
            'member_id' => $member->id,
            'organisation_no' => '123',
            'approved' => 1,
            'active' => 1
        ]);
    }
}