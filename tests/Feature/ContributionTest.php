<?php

namespace Tests\Feature;

use App\Models\Contribution;
use App\Models\ContributionReceipt;
use App\Models\ContributionType;
use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationMember;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Tests\TestDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContributionTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
    }

    /**
     * Testing if search by receipt_no works.
     *
     * @return void
     */
    public function testCanFindContributionByReceiptNo()
    {

        $user = MemberAccount::factory()->create();

        $organisation = Organisation::factory()->create([
            'name' => 'Contribution Test Org',
            'member_account_id' => $user->id
        ]);

        $membership = OrganisationMember::factory()->recycle( collect([$organisation, $user->member]) )->create();

        $contributionType = ContributionType::factory()->recycle($organisation)->create([
            'name' => 'Monthly Dues'
        ]);

        $receipt = ContributionReceipt::factory()->recycle($organisation)->create([
            'organisation_account_id' => $organisation->organisationAccounts()->first()?->id
        ]);

        $contributions = Contribution::factory(2)->recycle( 
            collect([$organisation, $receipt, $membership, $contributionType]) 
        )->create();

        $response = $this->actingAs($user, 'api')->withHeaders([
            'X-Tenant-Id' => $organisation->uuid
        ])->getJson('/api/contributions', [
            'receipt_no' => $receipt->receipt_no
        ]);

        $response->assertStatus(200)
            ->assertJson([ 'data' => [ ['receipt_no' => $receipt->receipt_no] ] ])
            ->assertJsonCount($contributions->count(), 'data');;
    }

    /**
     * Testing if search by receipt_dt works.
     *
     * @return void
     */
    public function testCanFindContributionByReceiptDate()
    {
        $user = MemberAccount::factory()->create();

        $organisation = Organisation::factory()->create([
            'name' => 'Contribution Test Org',
            'member_account_id' => $user->id
        ]);

        $membership = OrganisationMember::factory()->recycle( collect([$organisation, $user->member]) )->create();

        $contributionType = ContributionType::factory()->recycle($organisation)->create([
            'name' => 'Monthly Dues'
        ]);

        $today = date('Y-m-d');

        $receipt = ContributionReceipt::factory()->recycle($organisation)->create([
            'organisation_account_id' => $organisation->organisationAccounts()->first()?->id,
            'receipt_dt' => $today
        ]);

        $contributions = Contribution::factory(2)->recycle( 
            collect([$organisation, $receipt, $membership, $contributionType]) 
        )->create();


        $response = $this->actingAs($user, 'api')->withHeaders([
            'X-Tenant-Id' => $organisation->uuid
        ])->getJson('/api/contributions', [
            'receipt_dt' => $today
        ]);

        $response->assertStatus(200)
            ->assertJson(['data' => [ ['receipt_dt' => $today] ]])
            ->assertJsonCount($contributions->count(), 'data');
    }
}
