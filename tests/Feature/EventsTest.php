<?php

namespace Tests\Feature;

use App\Models\MemberAccount;
use App\Models\Organisation;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Tests\TestDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsTest extends TestCase
{
    // private MemberAccount $user;
    // private Organisation $organisation;
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // $this->user = MemberAccount::find(1);
        // $this->organisation = Organisation::find(1);
    }

    // public function testCanLoadEvents() {

    //     $response = $this->actingAs($this->user, 'api')->withHeaders([
    //         'X-Tenant-Id' => $this->organisation->uuid
    //     ])->getJson('/api/events');

    //     $response->assertStatus(200);
    // }
}
