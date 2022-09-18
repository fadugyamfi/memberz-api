<?php

namespace Tests\Feature;

use App\Models\MemberAccount;
use App\Models\Organisation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganisationMemberTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = MemberAccount::find(1);
        $this->organisation = Organisation::find(1);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_find_member_by_marital_status_of_single()
    {
        $response = $this->actingAs($this->user, 'api')->withHeaders([
            'X-Tenant-Id' => $this->organisation->uuid
        ])->getJson(
            route('api.organisation_members.index', [
                'marital_status' => 'single',
                'first_name_like' => 'Test'
            ])
        );

        $response->assertStatus(200)->assertJson([
            'data' => [
                [
                    'id' => 1,
                    'member' => [
                        'marital_status' => 'single'
                    ]
                ]
            ]
        ]);
    }

        /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_find_member_by_marital_status_of_married()
    {
        $response = $this->actingAs($this->user, 'api')->withHeaders([
            'X-Tenant-Id' => $this->organisation->uuid
        ])->getJson(
            route('api.organisation_members.index', [
                'marital_status' => 'married'
            ])
        );

        $response->assertStatus(200)->assertJson([
            'data' => [
                [
                    'id' => 2,
                    'member' => [
                        'marital_status' => 'married'
                    ]
                ]
            ]
        ]);
    }
}
