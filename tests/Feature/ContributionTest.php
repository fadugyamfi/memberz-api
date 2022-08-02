<?php

namespace Tests\Feature;

use App\Models\Contribution;
use App\Models\ContributionReceipt;
use App\Models\MemberAccount;
use App\Models\Organisation;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Tests\TestDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContributionTest extends TestCase
{

    private MemberAccount $user;
    private Organisation $organisation;
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = MemberAccount::find(1);
        $this->organisation = Organisation::find(1);

    }

    /**
     * Testing if search by receipt_no works.
     *
     * @return void
     */
    public function testCanFindContributionByReceiptNo()
    {

        $response = $this->actingAs($this->user, 'api')
        ->withHeaders([
            'X-Tenant-Id' => $this->organisation->uuid
        ])->getJson('/api/contributions', [
            'receipt_no' => 1
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    ['receipt_no' => 1]
                ]
            ]);
    }

    /**
     * Testing if search by receipt_dt works.
     *
     * @return void
     */
    public function testCanFindContributionByReceiptDate()
    {

        $response = $this->actingAs($this->user, 'api')
        ->withHeaders([
            'X-Tenant-Id' => $this->organisation->uuid
        ])->getJson('/api/contributions', [
            'receipt_dt' => '2022-07-02'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    ['receipt_dt' => '2022-07-02']
                ]
            ]);
    }
}
